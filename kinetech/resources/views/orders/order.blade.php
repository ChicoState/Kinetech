@extends('layout.layout')
@section('orderView')
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
                    <div class="dropdown">
                        <!--		  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown button
                                  </button>
                        -->
                        <a class="" href="/removeOne/{{$product['item']->sku }}">Remove One</a>
                        <a class="" href="/removeAll/{{$product['item']->sku }}">Remove All</a>
                    </div>
                </ul>
            @endforeach
        </div>
    @endif
@endsection
@section('orderStats')

    <div class="cartStats container col-xs-4 col-md-2 mx-1">
        @if(Session::has('cart') && $totalPrice > 0.01)
            <p> {{ $totalPrice }} </p>
        @else
            <p> Total: $0 </p>
        @endif
        <button type="submit" disabled="true"> Place Order </button>
    </div>
@endsection