@extends('layout.layout')
@section('orderSummary')
    @if('$orders')
        @foreach($orders as $order)
            <div class="ktOrder">
                {{ $order->price }}
                {{ $order->totalItems }}
                @if($order->created_at)
                    {{ date("D, d M Y", strtotime($order->created_at)) }}
                @endif
                <a href="/viewOrder/{{$order->order_id}}">View Order</a>
            </div>
        @endforeach
    @else
        <h1> No Orders </h1>
    @endif

@endsection