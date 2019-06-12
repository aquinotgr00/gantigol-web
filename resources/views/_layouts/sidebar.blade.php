<div class="col-3">
    <h4 class="section-header_title">LAPAK</h4>
    <hr>

    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
        <!--Product Slides-->
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
        <!--Product Controls-->
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

        <!-- Popular News -->
        <div class="col">
            <h4 class="section-header_title">BERITA POPULER</h4>
            <hr>

            @if (isset($popularPosts))
                @foreach ($popularPosts as $key => $post)
                    @php $key++ @endphp
                    <div class="side_post">
                        <a href="{{ route('blog.post', $post->id) }}">
                            <div class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                                <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                    <div class="event_day"><h3>{{$key}}<h3></div>
                                    <div class="event_month"></div>
                                </div>
                                <div class="side_post_content">
                                    <div class="side_post_title">{{$post->title}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                No popular posts.
            @endif

            <br>

            <!-- Today's Legend -->
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

        <!-- Follow Us -->
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