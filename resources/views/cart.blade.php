@extends('layout.mainlayout')
@section('content')
    <div class="product-wrapper">

        <div class="container">

            @if(Session::has('cart'))

                <div class="row">
                    <div class="col-sm-6 col-md-8 cart-list-container">
                        <ul class="list-group">

                            @foreach($products as $product)
                                <li class="list-group-item">
                                    <strong>{{ $product['item']['product_name'] }}</strong>
                                    <span class="price-background">{{ $product['price'] }}</span>


                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-xsdropdown-toogle" data-toggle="dropdown">Action<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Reduce by 1</a></li>
                                            <li><a href="#">Reduce All</a></li>
                                        </ul>
                                    </div>
                                    <span class="quantity float-right">{{ $product['qty'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-8 cart-list-container">
                        <strong>Total: {{$totalPrice}}</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-8 cart-list-container">
                        <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
                    </div>
                </div>


            @else
                <div class="row">
                    <div class="col-sm-6 col-md-8 cart-list-container">
                        <h2>No items in Cart!</h2>
                    </div>
                </div>

            @endif

        </div>
    </div>
@endsection
