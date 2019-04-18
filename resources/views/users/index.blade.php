@extends('layouts.global')
@section('title') Users List @endsection
@section('content')
	{{-- Daftar User Disini
	<br />
	@foreach($users as $user)
	- {{ $user->email }} <br />
	@endforeach --}}
	@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
	@endif
		
	<div class="row">
		<div class="col-md-12 text-right">
			<a href="{{ route('users.create') }}" class="btn btn-primary"> Create user</a>
		</div>
	</div>
	<br>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th><b>Name</b></th>
				<th><b>Username</b></th>
				<th><b></b>Email</th>
				<th><b>Avatar</b></th>
				<th><b>Action</b></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->username}}</td>
				<td>{{$user->email}}</td>
				<td>
					@if($user->avatar)
						<img src="{{ asset('storage/'.$user->avatar) }}" width="70px"/>
						@else
						N/A
					@endif
				</td>
				<td>
					<a class="btn btn-primary btn-sm" href="{{ route('users.show', ['id' => $user->id]) }}">detail</a>

					<a class="btn btn-info text-white btn-sm" href="{{ route('users.edit', ['id'=>$user->id]) }}">edit</a>

					<form onsubmit="return confirm('delete this user permanently?')" class="d-inline" action="{{ route('users.destroy', ['id' => $user->id])}}" method="post">
						@csrf
						<input type="hidden" name="_method" value="delete">
						<input type="submit" value="delete" class="btn btn-danger btn-sm">
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10">
					{{$users->links()}}
				</td>
			</tr>
		</tfoot>
	</table>
@endsection

