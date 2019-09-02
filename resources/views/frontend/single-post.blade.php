@extends('_layouts.wrapper')

@section('meta')
    <!-- twitter -->
    <meta name="twitter:card" content="summary_large_image" >
    <meta name="twitter:site" content="@GANTIGOL" >
    <meta name="twitter:creator" content="@GANTIGOL" >
    <meta name="twitter:title" content="{{ $data->title }}" >
    <meta name="twitter:image:src" content="{{ $data->image ?? asset('images\post\1.jpg') }}" >

    <!-- facebook -->
    <meta property="og:url" content="{{env('APP_URL')}}blog/post/{{$data->id}}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $data->title }}" />
    <meta property="og:image" content="{{ $data->image ?? asset('images\post\1.jpg') }}" />
    <meta property="og:image:url" content="{{ $data->image ?? asset('images\post\1.jpg') }}" />
    <meta property="og:site_name" content="Ganti GOl"/>

    <!-- whatsapp -->

    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
@endsection

@section('heading')
@include('_layouts.breadcrumb')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-9"> 
        <!-- Title -->
        <h4 class="title">{{ $data->title }}</h4>
        <!-- Author -->
        <hr>

        <!-- Date/Time -->
        {{-- <p><img class="mr-2 mt-1" src="{{ asset('images\icon\pen.svg') }}">Amalia on January 1, 2019 at 12:00 PM</p> --}}
        <p><img class="mr-2 mt-1" src="{{ asset('images\icon\pen.svg') }}">{{$data->author ?? "GantiGol"}} pada {{$data->publish_date ?? "Some day"}} jam 12:00 PM</p>
        <hr>

        <!-- Preview Image -->
        <div class="card">
            {{-- <img class="images-post" src="{{ $data->image ?? asset('images\post\1.jpg') }}" alt=""> --}}
            <img class="images-post single-post-image" src="{{ $data->image ?? 'https://imgplaceholder.com/928x469' }}" alt="">
            <p class="source">{{$data->source_image ?? "GantiGol"}}</p>
        </div>
        <br>


        <!-- Post Content -->
        {!!$data->body!!}
        {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

        <div class="quote">
            <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.makan ayo makan ayo makan</p>
                <cite title="Source Title">Source Title</cite>
            </blockquote>
        </div>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

        <!-- related post -->
        <div class="link-related">
            <div class="related-article">
                <div class="link">
                    <p> BACA JUGA:</p>
                    <a class="link" href="#"><p>AUBAMEYANG UNGKAP RAHASIA MEMPERDAYAI DAVID DE GEA LEWAT EKSEKUSI PENALTI</p></a>
                </div>
            </div>
        </div>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p> --}}
        <!-- end Post Content -->


        <br>
        <p>TAG:
            @foreach ($data->tagged as $key => $tag)
                <a style="font-size:15px;" href="{{route('blog.tags', $tag->tag_name)}}"><span class="tag">{{$tag->tag_name}}</span></a>
            @endforeach
        </p> 
        <br>

        {{-- Share button --}}
        <div>
            <div class="card-deck">
                <div class="card line bagikan d-none d-sm-flex">
                    <hr class="card-img-top ">
                </div>
                <div class="card share-card">
                    <div class="body">
                        <div class="share" style="z-index:9;">
                            <span class="share-btn"><button class="btn btn-dark" href="">BAGIKAN</button></span>
                            <nav>
                                <a class="social" href="http://www.twitter.com/intent/tweet?url={{env('APP_URL')}}blog/post/{{$data->id}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a class="social" href="https://www.facebook.com/sharer/sharer.php?u={{env('APP_URL')}}blog/post/{{$data->id}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a class="social" href="https://wa.me/?text={{env('APP_URL')}}blog/post/{{$data->id}}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="card line bagikan d-none d-sm-flex">
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
        <div id="multi-item-related" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item product active">
                    <div class="card-deck">
                        @if ($tagPosts != null)
                            @foreach ($tagPosts as $key => $post)
                                @if (0 != $key && 0 === ($key%3))
                                    </div></div>
                                    <div class="carousel-item product">
                                    <div class="card-deck">
                                @endif
                                <div class="col-md-4 px-0">
                                    <div class="card">
                                        <a href="{{ route('blog.post', $post->id) }}" style="height:165px;">
                                            <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap" style="height:100%;">
                                        </a>
                                        <div class="card-body" style="height:230px;">
                                            <a href="{{ route('blog.post', $post->id) }}" style="height:165px;">
                                                <h5 class="card-title">{{$post->title}}</h5>
                                                <p class="card-text">{{substr(strip_tags(html_entity_decode($post->body)), 0, 120)}}</p>
                                            </a>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">{!! date_format(new DateTime($post->publish_date),'d M')!!}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif (count($sameCategoryPosts) > 0)
                            @foreach ($sameCategoryPosts as $key => $post)
                                @if (0 != $key && 0 === ($key%3))
                                    </div></div>
                                    <div class="carousel-item product">
                                    <div class="card-deck">
                                @endif
                                <div class="col-md-4 px-0">
                                    <div class="card">
                                        <a href="{{ route('blog.post', $post->id) }}">
                                            <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">{{$post->title}}</h5>
                                            <p class="card-text">{{substr(strip_tags($post->body), 0, 120)}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">{!! date_format(new DateTime($post->publish_date),'d M')!!}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!--/.First slide-->

            </div>
            <!--/.Slides-->

        </div>
        <!--/.Carousel Wrapper-->

        {{-- @if ($tagPosts != null && count($tagPosts) > 3) --}}
            <div class="controls-top control">
                <div class="card-deck">
                    <div class="card line d-none d-sm-flex" style="margin-top:3px;">
                        <hr class="card-img-top">
                    </div>
                    <div class="row mt-0">
                        <div class="col-xs-6 latest-product-arrow-control arrow-control-left">
                            <div class="card" style="margin-right:5px;">
                                <a class="left" href="#multi-item-related" data-slide="prev"><i class="fas fa-chevron-left slide-arrow"></i></a>
                            </div>
                        </div>
                        <div class="col-xs-6 latest-product-arrow-control arrow-control-right">
                            <div class="card" style="margin-left:5px;">
                                <a class="left" href="#multi-item-related" data-slide="next"><i class="fas fa-chevron-right slide-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card line d-none d-sm-flex" style="margin-top:3px;">
                        <hr class="card-img-top">
                    </div>
                </div>
            </div>
        {{-- @endif --}}

        <!-- baju -->
        <h4 class="section-header_title">PRODUK TERKAIT</h4>
        <hr> 
        <div class="card-deck">
            @if ($tagProducts != null)
                @foreach ($tagProducts->data as $key => $value)
                    <div class="card col-md-4 px-0">
                        <a href="{{ route('products.single-product', $value->id) }}">
                            <img class="card-img-top gambar" src="{{ $value->image }}">
                        </a>
                        <div class="card-body produk">
                            <a href="{{ route('products.single-product', $value->id) }}">
                                <h5 class="card-title">{{$value->name}}</h5>
                            </a>
                            <p class="card-text">Rp. {{$value->price}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    @include('_layouts.sidebar')
</div>
@endsection
@section('script')
<script type="text/javascript">
if($(".instagram-media").length) {
    var tag = document.createElement('script');
    tag.src = "//www.instagram.com/embed.js";
    tag.defer = true;
    tag.async = true;
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}
</script>
@endsection