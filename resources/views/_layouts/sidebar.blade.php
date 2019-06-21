<div class="col-lg-3">
    <h4 class="section-header_title">LAPAK</h4>
    <hr>

    <!-- Lapak Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
        <!--Product Slides-->
        <div class="carousel-inner" role="listbox">
            @foreach ($sidePost['latestProducts'] as $key => $product)
                <!--First slide-->
                <div class="carousel-item
                    product
                    @if ($key == 0) active @endif
                    @if ($product->pre_order != null)
                    overflow-hidden
                    @endif
                    ">

                    <div class="col-md">
                        <div class="card mb-2">
                            @if ($product->pre_order != null)
                                <div class="card-badge">Pre Order</div>
                            @endif
                            <a href="{{ route('products.single-product', $product->id) }}">
                                <img class="card-img-top gambar" src="{{ $product->image }}">
                            </a href="#">
                            <div class="card-body produk">
                                <a href="#">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                </a>
                                <p class="card-text">Rp. {{ \AppHelper::instance()->rupiah($product->price) }}</p>
                            </div>
                        </div>
                    </div>

            </div>
            <!--/.First slide-->
            @endforeach
        </div>
        <!--/.Slides-->
        <!--Product Controls-->
        <div class="controls-top">
            <div class="card-deck arrow-control-wrapper">
                <div class="card line" style="margin-top:3px;">
                    <hr class="card-img-top d-none d-sm-flex">
                </div>
                <div class="row">
                    <div class="col-xs-6 latest-product-arrow-control arrow-control-left">
                        <div class="card" style="margin-right:5px;">
                            <a class="left" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left slide-arrow"></i></a>
                        </div>
                    </div>
                    <div class="col-xs-6 latest-product-arrow-control arrow-control-right">
                        <div class="card" style="margin-left:5px;">
                            <a class="left" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right slide-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card line" style="margin-top:3px;">
                    <hr class="card-img-top d-none d-sm-flex">
                </div>
            </div>
        </div>
    </div>

    <!-- Popular News -->
    <div class="col">
        <h4 class="section-header_title">BERITA POPULER</h4>
        <hr>
            @foreach ($sidePost['post'] as $key => $post)
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
        <br>

        <!-- Today's Legend -->
        <div class="col">
            <h4 class="section-header_title">LEGENDA HARI INI</h4>
            <hr>
            <div class="card">
                @foreach ($sidePost['legends'] as $key => $value)
                <img class="card-img-top" src="{{ $value->image }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{!! date_format(new DateTime($value->publish_date),'d F')!!}</h5>
                    <p class="card-text">{{ substr(strip_tags(html_entity_decode($value->body)), 0, 500) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <br>

    <!-- Follow Us -->
    <div class="col">
        <h4 class="section-header_title">IKUTI KAMI</h4>
        <hr>
        <div class="controls-top">
            <div class="row">
                <div class="col-12">
                    <div class="card line col-4">
                        <a href="#">
                            <img border="0" alt="W3Schools" src="{{ asset('images\ikuti\1.svg') }}">
                        </a>
                    </div>
                    <div class="card line col-4">
                        <a href="#">
                            <img border="0" alt="W3Schools" src="{{ asset('images\ikuti\2.svg') }}" >
                        </a>
                    </div>
                    <div class="card line col-4">
                        <a href="#">
                            <img border="0" alt="W3Schools" src="{{ asset('images\ikuti\3.svg') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>