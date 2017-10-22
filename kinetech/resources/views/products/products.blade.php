@extends('layout.layout')
@section('products')
<div class="container col-xs-12 col-sm-6 col-md-8 mx-auto" style="overflow: scroll; height: 100%;">
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
@section('productFilter')
	<div class="container col-xs-4 col-md-2 mx-1" style="height: 100%; background-color: #E8E8E8; float: left">
		<div class="mb-3 mt-5" >
			<h4> Price </h4>
			<div>
				<input type="number" name="minPrice" placeholder="Min" style="display: inline; max-width: 40%; margin: 2px;"> - 
				<input type="number" name="maxPrice" placeholder="Max" style="display: inline; max-width: 40%; margin: 2px;">
			</div>
		</div>
		<h4> Brands </h4>
		<ul >
		@foreach($productBrands as $brand)
			<li style="list-style: none;"><input type="checkbox" value=" {{ $brand->brand }}"> {{ $brand->brand }} </li>
		@endforeach
	</ul>
	</div>
@endsection