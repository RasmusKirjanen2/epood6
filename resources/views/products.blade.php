@extends('layout.mainlayout')
@section('content')
    <div class="product-wrapper">

        <div class="container">

            <div class="row">
                <div class="col-md-4 col-12">
                    {{ $products->links() }}
                </div>
            </div>

            @foreach($products->chunk(3) as $productChunk)
                <div class="row">
                    @foreach ($productChunk as $product)
                        <div class="col-md-4 col-12">
                            <div class="products-container">
                                <h3 class="product-title">
                                    <a href="/products/{{ $product->id }}" class="title">{{ $product->product_name }}</a>
                                </h3>

                                @if(str_contains($product->product_img, 'https'))
                                    <img src="{{ $product->product_img }}" class="img-fluid"/>
                                @elseif((!empty($product->product_img)))
                                    <img src="storage/thumbnails/{{ $product->product_img }}" class="img-fluid"/>
                                @else

                                @endif

                                <?php
                                $pieces = explode(" ", $product->product_desc);
                                $product_desc = implode(" ", array_splice($pieces, 0, 20));

                                //  <p>{{ substr($product->product_desc, 0, 120) }}</p>
                                ?>

                                <div class="product-desc">
                                    <p>{{ $product_desc }}</p>
                                </div>

                                @auth

                                    <a href="/products/edit/{{ $product->id }}" class="btn btn-light">Edit</a>
                                    <a href="/products/delete/{{ $product->id }}" class="btn btn-danger">Delete</a>

                                @endauth

                                    <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn add-to-cart">Lisa ostukorvi</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="row">
                <div class="col-md-4 col-12">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
