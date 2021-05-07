@extends('layout.mainlayout')
@section('content')

    <div class="container">

        <div class="title">
            <h3 class="product-title">{{ $product->product_name }}</h3>
        </div>

        <div class="show-container">
            @if(str_contains($product->product_img, 'https'))
                <img src="{{ $product->product_img }}" class="img-fluid"/>
            @elseif((!empty($product->product_img)))
                <img src="/storage/uploads/{{ $product->product_img }}" class="show-image"/>
            @else

            @endif
        </div>


        <div class="product-desc">
            <p>{{ $product->product_desc }}</p>
        </div>


        <div>
            <p>Hind {{ $product->product_price }}</p>
        </div>

        @auth
            <p>Lisa kommentaar</p>
            <form method="POST" action="/products/comment/{{$product->id}}">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <textarea class="form-control" id="comment-textarea" name="comment_body"></textarea>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="submit">
            </form>
        @endauth

        <h4 class="comments">Kommentaarid</h4>

        <div class="comments" id="comments-textarea">
            @foreach($comments as $comment)
                <p>{{$comment->body}}</p>
            @endforeach

        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                {{ $comments->links() }}
            </div>
        </div>

    </div>
@endsection



