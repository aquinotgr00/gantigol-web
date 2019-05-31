@extends('_layouts.wrapper')

@section('heading')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">HOME</a></li>
            <li class="breadcrumb-item active" aria-current="page">KLUB</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-9"> 
        <!-- Title -->
        <h4 class="title">BARCELONA AKAN MELAKUKAN PEMBELIAN NEGARA YANG MENJADI KANDANGNYA SEKARANG</h4>
        <!-- Author -->
        <hr>

        <!-- Date/Time -->
        <p><img class="mr-2 mt-1" src="{{ asset('images\icon\pen.svg') }}">Amalia on January 1, 2019 at 12:00 PM</p>
        <hr>

        <!-- Preview Image -->
        <div class="card">
            <img class="images-post" src="{{ asset('images\post\1.jpg') }}" alt="">
            <p class="source">stockimage.com</p>
        </div>
        <br>

        <!-- Post Content -->
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

        <div class="quote">
            <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.makan ayo makan ayo makan</p>
                <cite title="Source Title">Source Title</cite>
            </blockquote>
        </div>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

        <div class="link-related">
            <div class="related-article">
                <div class="link">
                    <p> BACA JUGA:</p>
                    <a class="link" href="#"><p>AUBAMEYANG UNGKAP RAHASIA MEMPERDAYAI DAVID DE GEA LEWAT EKSEKUSI PENALTI</p></a>
                </div>
            </div>
        </div>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>
        <br>
        <p>TAG: <span class="tag">liverpool</span></p> 
        <br>

        {{-- Share button --}}
        <div>
            <div class="card-deck">
                <div class="card line bagikan">
                    <hr class="card-img-top ">
                </div>
                <div class="card share-card">
                    <div class="body">
                        <div class="share">
                            <span class="share-btn"><button class="btn btn-dark" href="">BAGIKAN</button></span>
                            <nav>
                                <a class="social" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="social" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="social" href="#"><i class="fa fa-whatsapp"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card line bagikan">
                    <hr class="card-img-top ">
                </div>
            </div>
        </div>
        <br>
        <br>

        <!-- berita terkait -->
        <h4 class="section-header_title">BACA LAINNYA</h4>
        <hr> 
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item product active">
                    <div class="card-deck">
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
                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item product">
                    <div class="card-deck">
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
                </div>

                <!--Third slide-->
                <div class="carousel-item product">
                    <div class="card-deck">
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
                </div>
                <!--/.Third slide-->

            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->

        <div class="controls-top control">
            <div class="card-deck">
                <div class="card line">
                    <hr class="card-img-top ">
                </div>
                <div class="card post-next">
                    <a class="left" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                </div>
                <div class="card post-next">
                    <a class="left" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="card line">
                    <hr class="card-img-top">
                </div>
            </div>
        </div>

        <!-- baju -->
        <h4 class="section-header_title">PRODUK TERKAIT</h4>
        <hr> 
        <div class="card-deck">
            <div class="card">
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
            <div class="card">
                <a href="#">
                    <img class="card-img-top gambar" src="{{ asset('images\produk\1.png') }}">
                </a>
                <div class="card-body produk">
                    <a href="#">
                        <h5 class="card-title">KAOS AIR NIKE STELL</h5>
                    </a>
                    <p class="card-text">Rp. 150.000</p>
                </div>
            </div>
            <div class="card">
                <a href="#">
                    <img class="card-img-top gambar" src="{{ asset('images\produk\3.png') }}">
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

    <div class="col-3">
    
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
@endsection