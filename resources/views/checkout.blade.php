@extends('layout.mainlayout')
@section('content')

    <div class="container">
        <div class="col-sm-6 col-md-8 cart-list-container">
            <h1>Checkout</h1>
            <h4>Your Total: ${{ $total }} </h4>
            <form action="{{ route('checkout') }}" method="post">
                <div class="row">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="name">Aadress</label>
                        <input type="text" id="name" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="name">Card Holder Name</label>
                        <input type="text" id="name" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Buy now</button>
            </form>
        </div>
    </div>
@endsection
