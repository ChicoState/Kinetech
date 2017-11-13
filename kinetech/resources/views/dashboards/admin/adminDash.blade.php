@extends('layout.layout')
@section('adminProfileView')
@if($user['is_admin'] == 1)
<h4> Hello, {{ ucfirst($user['name']) }} </h4>
<hr>
<div>
	<form action="/updateProfile" method="post" accept-charset="utf-8">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{$user['id'] }}">
		Username:
		<input type="text" name="username" value="{{ ucfirst($user['name']) }}" placeholder="Username">
		<br>
		Email:
		<input type="email" name="email" value="{{$user['email'] }}" placeholder="Email">
		<br>
		Address:
		<input type="text" name="address" value=" {{ $user['address'] }} " placeholder="Address">
		<br>
		<input type="submit" name="submitButton" value="Submit">
	</form>
	<a href="/addProduct"> New Item </a>
	<a href="/updateProduct"> Update Item </a>
</div>
@endif

@endsection