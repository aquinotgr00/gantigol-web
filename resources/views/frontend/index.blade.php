@extends('_layouts.wrapper')

@section('heading')
@include('_layouts.banner')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-9">

        @if ($klub->post->total > 0)
            <h4 class="section-header_title">KLUB</h4>
            <hr>

            {{-- highlight POST --}}
            @if ($klub->highlight !== null)
            <div>
                <a href="{{ route('blog.post', $klub->highlight->id) }}" class="custom-card">
                    <div class="card bg-dark text-white post-highlight-wrapper" style="overflow:hidden">
                        <img class="card-img" src="{{$klub->highlight->image}}" alt="Card image" style="height:100%;">
                        <div class="card-img-overlay highlight-image-overlay" href="#">
                            <h3 class="card-title judul">{{$klub->highlight->title}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            {{-- NEWS ROW --}}
            <div class="card-deck">
                @foreach ($klub->post->data as $value)
                    <div class="col-md-4 px-0">
                        <div class="card">
                            <a href="{{ route('blog.post', $value->id) }}" class="single-post-a-img">
                                <img class="card-img-top" src="{{ $value->image }}" alt="Card image cap" style="height:100%;">
                            </a>
                            <div class="card-body" style="height:230px;">
                                <a href="{{ route('blog.post', $value->id) }}" style="height:165px;">
                                    <h5 class="card-title">{{$value->title}}</h5>
                                    <p class="card-text">
                                        @php
                                        // strip tags to avoid breaking any html
                                        $string = strip_tags($value->body);
                                        // truncate string
                                        $stringCut = substr($string, 0, 130);
                                        $string = substr($stringCut, 0);
                                        $string .= '...';
                                        echo $string;
                                        @endphp
                                    </p>
                                </a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{!! date_format(new DateTime($value->publish_date),'d M')!!}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- MORE ARTICLES ROW --}}
            <div class="card-deck">
                <div class="card line">
                    <hr class="card-img-top d-none d-sm-flex">
                </div>
                <div class="card">

                    <a class="btn btn-dark" href="{{ route('blog.category', 'klub') }}">ARTIKEL LAINNYA</a>
                </div>
                <div class="card line">
                    <hr class="card-img-top d-none d-sm-flex">
                </div>
            </div>

            <br>
            <br>
        @endif

        @if ($bola->post->total > 0)
            <h4 class="section-header_title">BOLA</h4>
            <hr>

            {{-- highlight POST --}}
            @if ($bola->highlight !== null)
            <div>
                <a href="{{ route('blog.post', $bola->highlight->id) }}" class="custom-card">
                    <div class="card bg-dark text-white post-highlight-wrapper" style="overflow:hidden">
                        <img class="card-img" src="{{ $bola->highlight->image}}" alt="Card image" style="height:100%;">
                        <div class="card-img-overlay highlight-image-overlay" href="#">
                            <h3 class="card-title judul">{{$bola->highlight->title}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            {{-- NEWS ROW --}}
            <div class="card-deck">
                @foreach ($bola->post->data as $value)
                    <div class="col-md-4 px-0">
                        <div class="card">
                            <a href="{{ route('blog.post', $value->id) }}" class="single-post-a-img">
                                <img class="card-img-top" src="{{ $value->image }}" alt="Card image cap" style="height:100%;">
                            </a>
                            <div class="card-body" style="height:230px;">
                                <a href="{{ route('blog.post', $value->id) }}" style="height:165px;">
                                    <h5 class="card-title">{{$value->title}}</h5>
                                    <p class="card-text">
                                        @php
                                        // strip tags to avoid breaking any html
                                        $string = strip_tags($value->body);
                                        // truncate string
                                        $stringCut = substr($string, 0, 130);
                                        $string = substr($stringCut, 0);
                                        $string .= '...';
                                        echo $string;
                                        @endphp
                                    </p>
                                </a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{!! date_format(new DateTime($value->publish_date),'d M')!!}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- MORE ARTICLES ROW --}}
            <div class="card-deck">
                <div class="card line">
                    <hr class="card-img-top d-none d-sm-flex">
                </div>
                <div class="card">
                    <a class="btn btn-dark" href="{{ route('blog.category', 'bola') }}">ARTIKEL LAINNYA</a>
                </div>
                <div class="card line">
                    <hr class="card-img-top d-none d-sm-flex">
                </div>
            </div>

            <br>
            <br>
        @endif

        @if ($man->post->total > 0)
            <h4 class="section-header_title">MAN</h4>
            <hr>

            {{-- highlight POST --}}
            @if ($man->highlight !== null)
            <div>
                <a href="{{ route('blog.post', $man->highlight->id) }}" class="custom-card">
                    <div class="card bg-dark text-white post-highlight-wrapper" style="overflow:hidden">
                        <img class="card-img" src="{{ $man->highlight->image }}" alt="Card image" style="height:100%;">
                        <div class="card-img-overlay highlight-image-overlay" href="#">
                            <h3 class="card-title judul">{{$man->highlight->title}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            {{-- NEWS ROW --}}
            <div class="card-deck">
                @foreach ($man->post->data as $value)
                    <div class="col-md-4 px-0">
                        <div class="card">
                            <a href="{{ route('blog.post', $value->id) }}" class="single-post-a-img">
                                <img class="card-img-top" src="{{ $value->image }}" alt="Card image cap" style="height:100%;">
                            </a>
                            <div class="card-body" style="height:230px;">
                                <a href="{{ route('blog.post', $value->id) }}" style="height:165px;">
                                    <h5 class="card-title">{{$value->title}}</h5>
                                    <p class="card-text">
                                        @php
                                        // strip tags to avoid breaking any html
                                        $string = strip_tags($value->body);
                                        // truncate string
                                        $stringCut = substr($string, 0, 130);
                                        $string = substr($stringCut, 0);
                                        $string .= '...';
                                        echo $string;
                                        @endphp
                                    </p>
                                </a>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{!! date_format(new DateTime($value->publish_date),'d M')!!}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- MORE ARTICLES ROW --}}
            <div class="card-deck">
                <div class="card line">
                    <hr class="card-img-top d-none d-sm-flex">
                </div>
                <div class="card">
                    <a class="btn btn-dark" href="{{ route('blog.category', 'man') }}">ARTIKEL LAINNYA</a>
                </div>
                <div class="card line">
                    <hr class="card-img-top d-none d-sm-flex">
                </div>
            </div>

            <br>
            <br>
        @endif

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