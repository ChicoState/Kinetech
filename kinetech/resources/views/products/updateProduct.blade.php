@extends('layout.layout')
@section('updateProduct')

<form action="/updateProduct" method="post" accept-charset="utf-8">
	{{ csrf_field() }}
	<input type="hidden" name="sku" value="{{$product->sku }}" placeholder="">
	Description:
	<input type="text" name="description" value="{{$product->description }}" placeholder="">
	<br>
	Image:
	<input type="text" name="image" value="{{$product->img }}" placeholder="">
	<br>
	Brand:
	<input type="text" name="brand" value="{{$product->brand }}" placeholder="">
	<br>
	Model:
	<input type="text" name="model" value="{{$product->model }}" placeholder="">
	<br>
	Color:
	<input type="text" name="color" value="{{$product->color }}" placeholder="">
	<br>
	Price:
	<input type="number" step="0.01" name="price" value="{{$product->price }}" placeholder="">
	<br>
	Stock:
	<input type="number" name="stock" value="{{ $product->stock }}" placeholder="">
	<br>
	<input type="submit" name="submitupdateItem" value="Update">
</form>
@endsection