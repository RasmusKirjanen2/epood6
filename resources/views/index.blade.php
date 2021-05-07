@extends('layout.mainlayout')
@section('content')
    <div class="container">

        <div class="row">
            <h2 class="title">UUED TOOTED</h2>
        </div>

        <div class="row row1">

            <div class="col-md-7 col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="css/images/1-1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="css/images/2-2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="css/images/3-3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-5 col-12">

                <div class="row add-center">
                    <div class="col-md-6 col-4 box11">
                        <div class="box1"><img src="css/images/1.jpg" class="img1" /></div>
                    </div>
                    <div class="col-md-6 col-4 box22">
                        <div class="box2 img2"><img src="css/images/2.jpg" class="img2" /></div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="container">
        <div class="row row2 justify-content-center">
            <div class="col-md-5 col-12">
                <div class="row">
                    <div class="col-6 box33">
                        <div class="box1 img3"><img src="css/images/2.jpg" class="img3" /></div>
                    </div>
                    <div class="col-6 box44">
                        <div class="box2 img4"><img src="css/images/2.jpg" class="img4" /></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <h3 class="title">Lorem ipsum dolor sit amet</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row row3 justify-content-center">
            <div class="col-md-5 col-12">
                <h3 class="title">Lorem ipsum dolor sit amet</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
            <div class="col-md-5 col-12">
                <div class="row">
                    <div class="col-6 box55">
                        <div class="box1 img5"><img src="css/images/2.jpg" class="img5" /></div>
                    </div>
                    <div class="col-6 box55">
                        <div class="box2 img6"><img src="css/images/2.jpg" class="img6" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h4 class="title">VIIMASED UUDISED</h4>
        <div class="row row4">
            <div class="col-md-4 col-12 box66">
                <div class="box3 img7"><img src="css/images/2.jpg" class="img6" /></div>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
            </div>
            <div class="col-md-4 col-12 box66">
                <div class="box3 img8"><img src="css/images/2.jpg" class="img6" /></div>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
            </div>
            <div class="col-md-4 col-12 box66">
                <div class="box3 img9"><img src="css/images/2.jpg" class="img6" /></div>
                <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
            </div>

        </div>
    </div>
@endsection
