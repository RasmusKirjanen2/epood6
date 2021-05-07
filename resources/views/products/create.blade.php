@extends('layout.mainlayout')
@section('content')
    <div class="product-wrapper">

        <div class="container">
            <form method="POST" action="/products/store" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="product-name">Toote nimi</label>
                        <input type="text" class="form-control" id="product-name" name="product_name" placeholder="" value="" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="product-desc">Toote hind</label>
                        <input type="text" class="form-control" id="product-price" name="product_price" placeholder="" value="" required>
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
                        <textarea class="form-control" id="product-desc-textarea" name="product_desc"></textarea>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="submit">
            </form>
        </div>


    </div>

@endsection
