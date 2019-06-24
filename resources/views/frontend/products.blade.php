@extends('_layouts.wrapper')

@section('heading')
@include('_layouts.banner')
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <h4 class="section-header_title ">PRODUK TERSEDIA</h4></div>
        <div class="col-3">
            <div class="dropdown">
                <div class="form-group">
                    <select name="sortBy" id="sortBy" class="gantigoal-select">
                        <option>Sort By</option>
                        <option>Latest</option>
                        <option>Lowest Price First</option>
                        <option>Highest Price First</option>
                    </select>
                </div>
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
                <!--Categories wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    {{-- <div class="card card-category">

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

                    </div> --}}
                    <!-- Accordion card -->

                    <!-- category items -->
                    @foreach ($categories as $key => $value)
                    <div class="card card-category">

                        <!-- Card header -->
                        <div class="card-header card-category" role="tab" id="heading-{{$key}}">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapse-{{$key}}" aria-expanded="false" aria-controls="collapse-{{$key}}">
                                <div>
                                    <p class="mb-0">
                                        {{$key}}
                                        @if (count($value) > 0)
                                            <span class="category card-category"><i class="fas fa-angle-down rotate-icon"></i></span>
                                        @endif
                                    </p>
                                </div>
                            </a>
                        </div>

                        <!-- Sub Category -->
                        @if (count($value) > 0)
                            @foreach ($value as $x => $sub)
                                <div id="collapse-{{$key}}" class="collapse" role="tabpanel" aria-labelledby="heading-{{$key}}" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <a href="">
                                            <p class="mb-0">
                                                {{$sub->name}}
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Product List -->
            <div class="col-lg-9" id="product-list">

                <div class="card-deck list">
                    @if ($data !== null)
                        @foreach ($data->data as $key => $product)
                            @php $key++ @endphp
                            <div class="col-md-4 px-0">
                                <div class="card overflow-hidden">
                                    @if ($product->pre_order != null)
                                        <div class="card-badge">Pre Order</div>
                                    @endif
                                    <a href="products/item/{{$product->id}}">
                                        <img class="card-img-top gambar" src="{{ $product->image }}">
                                    </a>
                                    <div class="card-body produk">
                                        <a href="products/item/{{$product->id}}">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                        </a>
                                        <p class="card-text">Rp. {{ \AppHelper::instance()->rupiah($product->price) }}</p>
                                    </div>
                                </div>
                            </div>
                            @if (0 === ($key%3))
                                </div>
                                <div class="card-deck">
                            @endif
                        @endforeach
                    @endif
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