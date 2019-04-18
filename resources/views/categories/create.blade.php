@extends('layouts.global')
@section('title') Create Category @endsection
@section('content')

	<div class="col-md-8">
		@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
		@endif
		<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{ route('categories.store') }}" method="POST">

			@csrf
			<label>Category Name</label>
			<br>
			<input type="text" name="name" class="form-control"/>
			<br>

			<label>Category Image</label>
			<br>
			<input type="file" id="image" name="image" class="form-control"/>
			<br>

			<input type="submit" value="save" class="btn btn-primary">

		</form>
	</div>
	

@endsection	