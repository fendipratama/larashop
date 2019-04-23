@extends('layouts.global')
@section('title')
    Trashed books
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th><b>Cover</b></th>
                        <td><b>Title</b></td>
                        <td><b>Author</b></td>
                        <td><b>Status</b></td>
                        <td><b>Categories</b></td>
                        <td><b>Stock</b></td>
                        <td><b>Price</b></td>
                        <td><b>Action</b></td>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>
                                    @if ($book->cover)
                                        <img src="{{asset('storage/'.$book->cover)}}" width="96px"/>
                                    @endif
                                </td>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author}}</td>
                                <td>
                                    @if ($book->status == "DRAFT")
                                    <span class="badge bg-dark text-white">
                                        {{$book->status}}
                                    </span>
                                    @else
                                    <span class="badge badge-success">
                                        {{$book->status}}
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="pl-3">
                                        @foreach ($book->categories as $category)
                                            <li>{{$category->name}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{$book->stock}}</td>
                                <td>{{$book->price}}</td>
                                <td>
                                    <form method="POST" action="{{route('books.restore', ['id' => $book->id])}}" class="d-inline">
                                        @csrf
                                        <input type="submit" value="Restore" class="btn btn-success">
                                    </form>
                                    <form method="POST" action="{{route('books.delete-permanent', ['id' => $book->id])}}" class="d-inline"  onsubmit="return confirm('Delete this book permanently?')">
                                        @csrf
                                        <input type="hidden" value="DELETE" name="_method">
                                        <input type="submit" value="Delete permanent" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                            <tr>
                                <td colspan="10">
                                    {{$books->appends(Request::all())->links()}}
                                </td>
                            </tr>
                        </tfoot>
            </table>
        </div>
    </div>
@endsection