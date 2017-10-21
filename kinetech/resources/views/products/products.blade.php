@extends('layout.layout')
@section('products')
<div class="container col-lg-8 mx-auto">
<h4> PRODUCTS </h4>
 @foreach($products as $product)
 <ul style="display:inline-block; margin: 3px; max-width: 30%;">
 	<li style="list-style: none; ">
 		<img  class="productImage" src= "{{ $product->img}}" style="height: 150px; width: 75px;">
 	</li>
 	<li style="list-style: none;">
 		<p> {{ $product->description }} </p>
 	</li>
 	<li style="list-style: none;">
 		<p> {{ $product->brand }} </p>
 	</li>
 	<li style="list-style: none;">
 		<p> {{ $product->model }} </p>
 	</li>
 	<li style="list-style: none;">
 		<p> $ {{ $product->price }} </p>
 	</li>
 	<li style="list-style: none; display: inline-block;">
 		<img src="/imgs/plus.png" onclick="console.log({{ $product->sku}});" style="height:30px; width: 30px; display: inline;">
	</li>
 </ul>
 @endforeach
</div>
@endsection