@extends('layout.layout')
@section('products')
<div class="container col-xs-12 col-sm-6 col-md-8 mx-auto productsView">
<h4> PRODUCTS </h4>
 @foreach($products as $product)
 <ul class="product" brand="{{$product->brand}}" price="{{$product->price}}">
 	<li>
 		<img  class="productImage" src= "{{ $product->img}}">
 	</li>
 	<li>
 		<p> {{ $product->description }} </p>
 	</li>
 	<li>
 		<p> {{ $product->brand }} </p>
 	</li>
 	<li>
 		<p> {{ $product->model }} </p>
 	</li>
 	<li>
 		<p> $ {{ $product->price }} </p>
 	</li>
 	<li> 		
 		<button class="btn btn-primary" onclick="addToCart({{$product->sku }}); "> Add To Cart </a>
	</li>
 </ul>
 @endforeach
</div>
@endsection
@section('productFilter')
	<div class="productFilterPadding">
	<div class="productFilterColumn container col-xs-4 col-md-2 mx-1">
		<div class="mb-3 mt-5" >
			<h4> Price </h4>
			<div>
				<input type="number" name="minPrice" placeholder="Min" onchange="setMinPrice(this.value);"> - 
				<input type="number" name="maxPrice" placeholder="Max" onchange="setMaxPrice(this.value);">
			</div>
		</div>
		<h4> Brands </h4>
		<ul >
		@foreach($productBrands as $brand)
			<li style="list-style: none;">
				<label for="{{ $brand->brand }}">
					<input type="checkbox"  id="{{$brand->brand}}" value=" {{ $brand->brand }}" onclick="filterBrand({{ $brand->brand }});"> {{ $brand->brand }}
				</label>
			</li>
		@endforeach
	</ul>
	<a href="/products">RESET</a>
	<a href="/cart"> CHECKOUT </a>
	</div>
	</div>
@endsection