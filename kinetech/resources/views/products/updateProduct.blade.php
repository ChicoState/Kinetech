@extends('layout.layout')
@section('updateProduct')
<form action="/updateProduct" method="post" accept-charset="utf-8">
	{{ csrf_field() }}
	<input type="submit" name="submitupdateItem" value="Submit">
</form>
@endsection