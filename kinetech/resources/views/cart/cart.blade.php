@extends('layout.layout')
@section('cartView')
<div class="col-lg-8">
	@php($totalPrice = 0)
	<h4> My Cart </h4>
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
		 		@php($totalPrice += $product->price)
		 	</li>
		 	<li>
				<img name="minus" class="productMinus" src="/imgs/minus.png" onclick="removeFromCart({{$product->sku }} ">
			</li>
		 </ul>
 @endforeach
</div>
@endsection
@section('cartStats')
<div class="cartStats container col-xs-4 col-md-2 mx-1">
	<p> Total: $ {{ $totalPrice }} </p>
	<div>
		<h6> Order Details </h6>
		<div>
			@foreach($products as $product)
				<p> {{ $product->brand}} {{ $product->model }} </p>
			@endforeach
		</div>	
	</div>
	<button type="submit" disabled="true"> Place Order </button>
</div>
@endsection