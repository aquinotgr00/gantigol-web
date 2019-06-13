@extends('_layouts.wrapper')

@section('heading')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        @if (count($banners) >= 1)
        @foreach ($banners as $key => $banner)
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item {{ $key == 0 ? 'active':'' }}" style="background-image: url('http://fcwallpaper.com/wp-content/uploads/2018/07/Wallpaper-Desktop-CR7-Juventus-HD.jpg')">>
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">{{$banner->title}}</h3>
                    <a class="btn btn-primary" href="{{ route('blog.post', $banner->url) }}">SELENGKAPNYA</a>
                </div>
            </div>
        @endforeach
        @endif
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
        <h4 class="section-header_title">KLUB</h4>
        <hr>

        {{-- highlight POST --}}
        @if ($klub->highlight !== null)
        <div>
            <a href="{{ route('blog.post', $klub->highlight->id) }}" class="custom-card">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{ asset('images\content\1.png') }}" alt="Card image">
                    <div class="card-img-overlay" href="#">
                        <h3 class="card-title judul">{{$klub->highlight->title}}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endif
        {{-- NEWS ROW --}}
        <div class="card-deck">
            @foreach ($klub->post->data as $value)
                <div class="card">
                    <a href="{{ route('blog.post', $value->id) }}">
                        <img class="card-img-top" src="{{ asset('images\content\2.png') }}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$value->title}}</h5>
                        <p class="card-text">{{$value->body}}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- MORE ARTICLES ROW --}}
        <div class="card-deck">
            <div class="card line">
                <hr class="card-img-top ">
            </div>
            <div class="card">
                <a class="btn btn-dark" href="{{ route('blog.category', 'klub') }}">ARTIKEL LAINNYA</a>
            </div>
            <div class="card line">
                <hr class="card-img-top ">
            </div>
        </div>

        <br>
        <br>

        <h4 class="section-header_title">BOLA</h4>
        <hr>

        {{-- highlight POST --}}
        @if ($bola->highlight !== null)
        <div>
            <a href="{{ route('blog.post', $bola->highlight->id) }}" class="custom-card">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{ asset('images\content\1.png') }}" alt="Card image">
                    <div class="card-img-overlay" href="#">
                        <h3 class="card-title judul">{{$bola->highlight->title}}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endif
        {{-- NEWS ROW --}}
        <div class="card-deck">
            @foreach ($bola->post->data as $value)
                <div class="card">
                    <a href="{{ route('blog.post', $value->id) }}">
                        <img class="card-img-top" src="{{ asset('images\content\2.png') }}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$value->title}}</h5>
                        <p class="card-text">{{$value->body}}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- MORE ARTICLES ROW --}}
        <div class="card-deck">
            <div class="card line">
                <hr class="card-img-top ">
            </div>
            <div class="card">
                <a class="btn btn-dark" href="{{ route('blog.category', 'bola') }}">ARTIKEL LAINNYA</a>
            </div>
            <div class="card line">
                <hr class="card-img-top ">
            </div>
        </div>

        <br>
        <br>


        <h4 class="section-header_title">MAN</h4>
        <hr>

        {{-- highlight POST --}}
        @if ($man->highlight !== null)
        <div>
            <a href="{{ route('blog.post', $man->highlight->id) }}" class="custom-card">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="{{ asset('images\content\1.png') }}" alt="Card image">
                    <div class="card-img-overlay" href="#">
                        <h3 class="card-title judul">{{$man->highlight->title}}</h3>
                    </div>
                </div>
            </a>
        </div>
        @endif
        {{-- NEWS ROW --}}
        <div class="card-deck">
            @foreach ($man->post->data as $value)
                <div class="card">
                    <a href="{{ route('blog.post', $value->id) }}">
                        <img class="card-img-top" src="{{ asset('images\content\2.png') }}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$value->title}}</h5>
                        <p class="card-text">{{$value->body}}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- MORE ARTICLES ROW --}}
        <div class="card-deck">
            <div class="card line">
                <hr class="card-img-top ">
            </div>
            <div class="card">
                <a class="btn btn-dark" href="{{ route('blog.category', 'man') }}">ARTIKEL LAINNYA</a>
            </div>
            <div class="card line">
                <hr class="card-img-top ">
            </div>
        </div>

        <br>
        <br>

    </div>

    @include('_layouts.sidebar')
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            @if(session()->has('error'))
                $('li.dropdown.forgot.login-parent a[role=button]').parent().toggleClass('show')
                $('li.dropdown.forgot.login-parent a[role=button]').parent().children('div.dropdown-menu.login').toggleClass('show')
            @endif
        })
    </script>
@endsection