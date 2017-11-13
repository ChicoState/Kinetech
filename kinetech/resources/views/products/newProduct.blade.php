@extends('layout.layout')
@section('newProduct')
<form action="/addProduct" method="post" accept-charset="utf-8">
	{{ csrf_field() }}
	<input type="submit" name="submitNewItem" value="Submit">
</form>
@endsection