@extends('layout.layout')
@section('cartView')
<div class="col-lg-8">
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
 				<img class="productMinus" src="/imgs/minus.png" value="{{$product->sku }}" onclick="removeFromCart({{ $product->sku}});">
			</li>
		 </ul>
 @endforeach
</div>
@endsection