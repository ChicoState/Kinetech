@extends('layout.layout')
@section('orderView')
    <div class="col-lg-8 pt-10">
        <h4> My Order </h4>
        @foreach($products as $product)
            <ul class="product">
                <li>
                    <img src="{{ $product['product']->img }} " class="productImage">
                </li>
                <li class>
                    <p> {{ $product['product']->sku }} </p>
                </li>
                <li class>
                    <p> {{ $product['product']->description }} </p>
                    <span class="badge badge-primary"> {{ $product['qty'] }} </span>
                </li>
                <li class>
                    <p> {{ $product['product']->brand }} </p>
                </li>
                <li class>
                    <p> {{ $product['product']->model }} </p>
                </li>
                <li class>
                    <p> {{ $product['product']->color }} </p>
                </li>
                <li class>
                    <p>${{ $product['product']->price }} each</p>
                </li>
            </ul>
        @endforeach
    </div>
@endsection
@section('orderStats')

    <div class="orderStats container col-xs-4 col-md-2 mx-1">
        @if( $totalPrice >= 0.01)
            <p> {{ $totalPrice }} </p>
        @else
            <p> Total: $0 </p>
        @endif
        <a href="/viewOrders"> View Orders</a>
    </div>
@endsection