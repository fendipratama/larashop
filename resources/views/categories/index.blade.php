@extends('layouts.global')
@section('title') Category List @endsection
@section('content')

@if(session('status'))
	<div class="alert alert-success">
		{{session('status')}}
	</div>
@endif

	<div class="row">
		<div class="col-md-12 text-right">
			<a href="{{ route('categories.create') }}" class="btn btn-primary"> Create category</a>
		</div>
	</div>
	<br>

	<div class="row">
			
		<div class="col-md-12">
			<table class="table table-bordered table-stripped">
				<thead>
					<tr>
						<th>
							<b>Name</b>
						</th>
						<th>
							<b>Slug</b>
						</th>
						<th>
							<b>Image</b>
						</th>
						<th>
							<b>Action</b>
						</th>
					</tr>
				</thead>

				<tbody>
					@foreach($categories as $dt)
					<tr>
						<td>{{$dt->name}}</td>
						<td>{{$dt->slug}}</td>
						<td>
							@if ($dt->image)
								<img src="{{asset('storage/'.$dt->image)}}" width="48px" />
							@else
								No Image
							@endif
						</td>
						<td>
							<a href="{{route('categories.show',['id'=>$dt->id])}}" class="btn btn-primary btn-sm"> 
								Detail
							</a>
							<a href="{{route('categories.edit',['id'=>$dt->id])}}" class="btn btn-info btn-sm"> 
								Edit
							</a>
							{{-- <a href="{{route('categories.edit',['id'=>$dt->id])}}" class="btn btn-danger btn-sm"> 
								Delete
							</a> --}}
							<form class="d-inline" action="{{route('categories.destroy', ['id' => $dt->id])}}" method="POST" onsubmit="return confirm('move category to trash?')">
								@csrf
								<input type="hidden" value="Delete" name="_method">
								<input type="submit" class="btn btn-danger btn-sm" value="Trash"> 
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