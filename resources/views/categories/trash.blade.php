@extends('layouts.global')
@section('title')
    Trashed category
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <th>
                            Slug
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $dt)
                        <tr>
                            <td>
                                {{$dt->name}}
                            </td>
                            <td>
                                {{$dt->slug}}
                            </td>
                            <td>
                                @if ($dt->image)
                                <img src="{{asset('storage/'.$dt->image)}}" width="48px" />
                                @endif
                            </td>
                            <td>
                                <a href="{{route('categories.restore', ['id' => $dt->id])}}" class="btn btn-success btn-sm">Restore</a> 
                                <form class="d-inline" action="{{route('categories.delete-permanent', ['id' => $dt->id])}}" method="POST" onsubmit="return confirm('delete this category permanently?')">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" /> 
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">
                            {{$categories->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection