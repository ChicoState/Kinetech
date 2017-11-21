@extends('layout.layout')
@section('newProduct')
<form action="/addProduct" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	SKU:
	<input type="number" name="sku" value="{{$lastSku}}" placeholder=" {{ $lastSku }} ">
	<br>
	Description:
	<input type="text" name="description" value="" placeholder="Enter Description Here">
	<br>
	Image:
	<input type="file" name="file" value="" placeholder="Browse">
	<br>
	Brand:
	<input type="text" name="brand" value="" placeholder="Enter Brand Here">
	<br>
	Model:
	<input type="text" name="model" value="" placeholder="Enter Model Here">
	<br>
	Color:
	<input type="text" name="color" value="" placeholder="Enter Color Here">
	<br>
	Price:
	<input type="number" step="0.01" name="price" value="" placeholder="Enter Price Here">
	<br>

	<input type="submit" name="submitNewItem" value="Submit">
</form>
@endsection