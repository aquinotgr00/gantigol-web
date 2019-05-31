@extends('_layouts.wrapper')

@section('heading')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('https://www.engineered-life.com/wp-content/uploads/2018/03/banner-BE.jpg')">>
    
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">SOSOK CRISTIANO RONALDO BIKIN JUVENTUS BELAJAR SETIAP HARI</h3>
                    <button type="button" class="btn btn-primary">SELENGKAPNYA</button>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://www.engineered-life.com/wp-content/uploads/2018/03/banner-BE.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">SOSOK CRISTIANO RONALDO BIKIN JUVENTUS BELAJAR SETIAP HARI</h3>
                    <button type="button" class="btn btn-primary">SELENGKAPNYA</button>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://www.engineered-life.com/wp-content/uploads/2018/03/banner-BE.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">SOSOK CRISTIANO RONALDO BIKIN JUVENTUS BELAJAR SETIAP HARI</h3>
                    <button type="button" class="btn btn-primary">SELENGKAPNYA</button>
                </div>
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
<br>
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <h4 class="section-header_title ">PRODUK TERSEDIA</h4></div>
        <div class="col-3 ">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle list-product" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div>
                        <p class="mb-0 sort-by">
                            Sort By
                        </p>
                        <span class="category card-category"><i class="fas fa-angle-down rotate-icon"></i></span>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <hr>

    <div>
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <div class="kategori">
                    <h5>
                        KATEGORI
                    </h5>
                </div>
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card card-category">

                        <!-- Card header -->
                        <div class="card-header card-category" role="tab" id="headingOne1">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                                <div>
                                    <p class="mb-0">
                                        Atasan<span class="category card-category"><i class="fas fa-angle-down rotate-icon"></i></span>
                                    </p>

                                </div>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                            <div class="card-body">
                                <a href="">
                                    <b class="mb-0">
                                    Kaos Lengan Pendek
                                    </b>
                                </a>
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->

                    <!-- Accordion card -->
                    <div class="card card-category">

                        <!-- Card header -->
                        <div class="card-header card-category" role="tab" id="headingTwo2">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                <div>
                                    <p class="mb-0">
                                        Bawahan<span class="category card-category"><i class="fas fa-angle-down rotate-icon"></i></span>
                                    </p>

                                </div>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                            <div class="card-body">
                                <a href="">
                                    <p class="mb-0">
                                        Celana Pendek
                                    </p>
                                </a>
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->
                </div>
            </div>

            <div class="col-9" id="product-list">
                
                <div class="card-deck list">
                    @foreach ($data->data as $key => $product)
                        {{-- @if (0 === $key || 0 === ($key%3)) --}}
                        @if (0 === ($key%3))
                            </div>
                            <div class="card-deck">
                        @endif
                        <div class="col-md-4 px-0">
                            <div class="card overflow-hidden">
                                <div class="card-badge">Pre Order</div>
                                <a href="products/item/{{$product->id}}">
                                    <img class="card-img-top gambar" src="{{ asset('images\produk\2.png') }}">
                                </a>
                                <div class="card-body produk">
                                    <a href="#">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                    </a>
                                    <p class="card-text">Rp. {{ $product->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="row mt-0">
        <div class="col-md-3"></div>
        <div class="col-md-9 ajax-load card-deck mt-0" style="display:none;">
            <img class="mx-auto d-block mt-3" style="height: 100px;" src="{{ asset('images\loading\1.gif') }}">
        </div>
    </div>
@endsection

@section('script')
{{-- jquery lazy load plugins --}}
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

<script>
    $(document).ready(function () {
        // let height = $(window).height()
        // let productHeight = 1200
        // let lazyLoaded = 1
        // $(window).scroll(() => {
        //     let currentPos = window.pageYOffset
        //     if (currentPos >= productHeight && l) {
        //         console.log('load the damn thing')
        //     }
        // })
        var page = 1;
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page){
            $.ajax(
                {
                    url: 'products/page/' + page,
                    type: "get",
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data)
                {
                    console.log(data)
                    if(data.html == " "){
                        $('.ajax-load').html("<p class='text-center nomore-products'>No more products found.</p>");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#product-list").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('server not responding...');
                }
            );
        }
    })
</script>
@endsection