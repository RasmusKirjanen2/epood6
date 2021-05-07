@extends('layout.mainlayout')
@section('content')
    <div class="product-wrapper">

        <div class="container">

            <a href="products/create" class="btn btn-info create-btn">Create</a>


            <div class="row">
                <div class="col-md-1 col-12">id</div>
                <div class="col-md-2 col-12">Name</div>
                <div class="col-md-3 col-12">created</div>
                <div class="col-md-3 col-12">Modified</div>
                <div class="col-md-3 col-12">actions</div>
            </div>

            <div class="row">
                @foreach ($products as $product)

                    <div class="col-md-1 col-12">
                        <p>{{ $product->id }}<p>
                    </div>
                    <div class="col-md-2 col-12">
                        <p>{{ $product->product_name }}<p>
                    </div>
                    <div class="col-md-3 col-12">
                        <p>{{ $product->created_at }}<p>
                    </div>
                    <div class="col-md-3 col-12">
                        <p>{{ $product->updated_at }}<p>
                    </div>
                    <div class="col-md-3 col-12">
                        @auth
                            <a href="/products/{{ $product->id }}" class="btn btn-light">View</a>
                            <a href="/products/edit/{{ $product->id }}" class="btn btn-info">Edit</a>
                            <a href="/products/delete/{{ $product->id }}" class="btn btn-danger">Delete</a>
                        @endauth
                    </div>

                @endforeach
            </div>

            <div class="row">
                <div class="col-md-4 col-12">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
