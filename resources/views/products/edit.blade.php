@extends('layout.mainlayout')
@section('content')
    <div class="product-wrapper">

        <div class="container">

            <form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="form-row">
                    <div class="col-md-6">
                        <label for="product-name">Toote nimi</label>
                        <input type="text" class="form-control {{ $errors->has('product_name') ? 'alert-danger' : '' }}" name="product_name" id="product-name" placeholder="" value="{{ $product->product_name }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="product-desc">Toote hind</label>
                        <input type="text" class="form-control {{ $errors->has('product_price') ? 'alert-danger' : '' }}" name="product_price" id="product-price" placeholder="" value="{{ $product->product_price }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <input type="file" name="product_img">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="product-desc">Toote kirjeldus</label>
                        <textarea class="form-control {{ $errors->has('product_desc') ? 'alert-danger' : '' }}" name="product_desc" id="product-desc-textarea" required>{{ $product->product_desc }}</textarea>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="submit">

            </form>
        </div>
    </div>
@endsection
