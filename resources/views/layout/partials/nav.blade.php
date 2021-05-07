<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="/css/images/Vector.svg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">E-pood <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Meist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Tooted</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Postitused</a>
                    </li>
                @endauth

            </ul>

            @if (Route::has('login'))


                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block nav-container">
                    @auth
                        <form method="post" action="{{route('logout')}}" class="nav-link2">
                            @csrf
                            <input type="submit" class="logout-btn"  value="Logout">
                        </form>

                        <a href="{{ url('/dashboard') }}" class="nav-link2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link2">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link2">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            <img class="search-btn" src="/css/images/Group1.png">

            <a href="/cart" class="cart-container">
                <img src="/css/images/shopping-cart 1.png">

                @if(Session::has('cart'))
                    <span class="cart-nr-container"><span class="cart-nr">{{ Session::get('cart')->totalQty }}</span></span>
                @endif
            </a>
        </div>
    </nav>
</div>
