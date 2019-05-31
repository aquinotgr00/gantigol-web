@extends('_layouts.wrapper')

@section('heading')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">HOME</a></li>
            <li class="breadcrumb-item active" aria-current="page">TAGS</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-9"> 
         <div class="card-deck mt-0">
            <div class="card">
                <a href="">
                    <img class="card-img-top" src="{{ asset('images\content\2.png') }}" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h5 class="card-title">AUBAMEYANG UNGKAP RAHASIA MEMPERDAYAI DAVID DE GEA LEWAT EKSEKUSI PENALTI</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <a href="">
                    <img class="card-img-top" src="{{ asset('images\content\3.png') }}" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h5 class="card-title">LEGENDA MAN UNITED SEBUT SOLSKJAER BUKAN MANAJER YANG PINTAR</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <a href="">
                    <img class="card-img-top" src="{{ asset('images\content\4.png') }}" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h5 class="card-title">GAGAL BERSINAR, LIVERPOOL SIAP JUAL RUGI NABY KEITA</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="card-deck">
            <img class="  mx-auto d-block mt-5 " style="height: 100px;" src="{{ asset('images\loading\1.gif') }}">
        </div>
    </div>

    <div class="col-3">
        <h4 class="section-header_title">LAPAK</h4>
        <hr>

        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active product">

                    <div class="col-md">
                        <div class="card mb-2">
                            <a href="#">
                                <img class="card-img-top gambar" src="{{ asset('images\produk\2.png') }}">
                            </a href="#">
                            <div class="card-body produk">
                                <a href="#">
                                    <h5 class="card-title">KAOS AIR NIKE STELL</h5>
                                </a>
                                <p class="card-text">Rp. 150.000</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item product">

                    <div class="col-md">
                        <div class="card mb-2">
                            <a href="#">
                                <img class="card-img-top gambar" src="{{ asset('images\produk\2.png') }}">
                            </a>
                            <div class="card-body produk">
                                <a href="#">
                                    <h5 class="card-title">KAOS AIR NIKE STELL</h5>
                                </a>
                                <p class="card-text">Rp. 150.000</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Second slide-->

                <!--Third slide-->
                <div class="carousel-item product">

                    <div class="col-md">
                        <div class="card mb-2">
                            <a href="#">
                                <img class="card-img-top gambar" src="{{ asset('images\produk\3.png') }}">
                            </a>
                            <div class="card-body produk">
                                <a href="">
                                    <h5 class="card-title">KAOS AIR NIKE STELL</h5>
                                </a>
                                <p class="card-text">Rp. 150.000</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Third slide-->

            </div>
            <!--/.Slides-->
            <!--Controls-->
            <div class="controls-top">
                <div class="card-deck">
                    <div class="card line">
                        <hr class="card-img-top ">
                    </div>
                    <div class="card next">
                        <a class="left" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                    </div>
                    <div class="card next">
                        <a class="left" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="card line">
                        <hr class="card-img-top ">
                    </div>
                </div>
            </div>
            <div class="side-bar"></div>

            <div class="col">
                <h4 class="section-header_title">BERITA POPULER</h4>
                <hr>

                <div class="side_post">
                    <a href="#">
                        <div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day"><h3>1<h3></div>
                                <div class="event_month"></div>
                            </div>
                            <div class="side_post_content">
                                <div class="side_post_title">AUBAMEYANG UNGKAP RAHASIA MEMPERDAYAI DAVID DE GEA LEWAT EKSEKUSI PENALTI</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="side_post">
                    <a href="#">
                        <div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day"><h3>2<h3></div>
                                <div class="event_month"></div>
                            </div>
                            <div class="side_post_content">
                                <div class="side_post_title">Gol Indah Salah Bantu Liverpool Bekuk Chelsea</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="side_post">
                    <a href="#">
                        <div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day"><h3>3<h3></div>
                                <div class="event_month"></div>
                            </div>
                            <div class="side_post_content">
                                <div class="side_post_title">Striker Burnley Dapat Kartu Kuning Setelah Mencium Pemain Cardiff City</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="side_post">
                    <a href="#">
                        <div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center ">
                                <div class="event_day"><h3>4<h3></div>
                                <div class="event_month"></div>
                            </div>
                            <div class="side_post_content ">
                                <div class="side_post_title align-middle">Jadi Incaran Banyak Klub Elite Eropa, Jurgen Klopp Setia Bertahan di Liverpool</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="side_post">
                    <a href="#">
                        <div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day"><h3>5<h3></div>
                                <div class="event_month"></div>
                            </div>
                            <div class="side_post_content">
                                <div class="side_post_title">AUBAMEYANG UNGKAP RAHASIA MEMPERDAYAI DAVID DE GEA LEWAT EKSEKUSI PENALTI</div>
                            </div>
                        </div>
                    </a>
                </div>
                <br>
                <div class="side-bar"></div>

                <div class="col">
                    <h4 class="section-header_title">LEGENDA HARI INI</h4>
                    <hr>
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images\content\2.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">29 FEBUARI</h5>
                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- <IKUTI> -->
            <div class="side-bar"></div>

            <div class="col">
                <h4 class="section-header_title">IKUTI KAMI</h4>
                <hr>
                <div class="controls-top">
                    <div class="card-deck ikuti">
                        <div class="card line">
                            <a href="#">
                                <img border="0" alt="W3Schools" src="{{ asset('images\ikuti\1.svg') }}">
                            </a>
                        </div>
                        <div class="card line">
                            <a href="#">
                                <img border="0" alt="W3Schools" src="{{ asset('images\ikuti\2.svg') }}" >
                            </a>
                        </div>
                        <div class="card line">
                            <a href="#">
                                <img border="0" alt="W3Schools" src="{{ asset('images\ikuti\3.svg') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection