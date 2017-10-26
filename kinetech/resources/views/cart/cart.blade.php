@extends('layout.layout')
@section('cartView')
@if(Session::has('cart'))
<div class="col-lg-8">
	<h4> My Cart </h4>
	@foreach($products as $product)
	<ul class="product">
		<li>
			<img src="{{ $product['item']->img }} " class="productImage">
		</li>
		<li class>
			<p> {{ $product['item']->sku }} </p>
		</li>
		<li class>
			<p> {{ $product['item']->description }} </p>
			<span class="badge badge-primary"> {{ $product['qty'] }} </span>
		</li>
		<li class>
			<p> {{ $product['item']->brand }} </p>
		</li>
		<li class>
			<p> {{ $product['item']->model }} </p>
		</li>
		<li class>
			<p> {{ $product['item']->color }} </p>
		</li>
	</ul>
	@endforeach
</div>
@endif
@endsection
@section('cartStats')
<div class="cartStats container col-xs-4 col-md-2 mx-1">
	<p> Total: $ {{ $totalPrice }} </p>
	<button type="submit" disabled="true"> Place Order </button>
</div>
@endsection