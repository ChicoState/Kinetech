@extends('layout.layout')
@section('products')
<h4> PRODUCTS </h4>
<div class="container">
 @foreach($products as $product)
 	<p> {{ $product->sku }} </p>
 	<p> {{ $product->description }} </p>
 	<p> {{ $product->img }} </p>
 	<p> {{ $product->brand }} </p>
 	<p> {{ $product->model }} </p>
 	<p> {{ $product->color }} </p>
 	<p> {{ $product->price }} </p>
 	<p> {{ $product->stock }} </p>
 @endforeach
</div>
@endsection