@extends('_layouts.wrapper')

@section('heading')
@include('_layouts.breadcrumb')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-9">
        @if ($data->highlight !== null)
            <div>
                <a href="{{ route('blog.post', $data->highlight->id) }}" class="custom-card">
                    <div class="card bg-dark text-white post-highlight-wrapper" style="overflow:hidden">
                        <img class="card-img" src="{{$data->highlight->image}}" alt="Card image" style="height:100%;">
                        <div class="card-img-overlay highlight-image-overlay" href="#">
                            <h3 class="card-title judul">{{$data->highlight->title}}</h3>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        @if (count($data->post->data) >= 1)
        <div id="post-list">
            <div class="card-deck">
                @foreach ($data->post->data as $key => $post)
                    @if (0 !== $key && 0 === ($key%3))
                        </div>
                        <div class="card-deck">
                    @endif
                    <div class="col-md-4 px-0">
                        <div class="card">
                            <a href="{{ route('blog.post', $post->id) }}" class="single-post-a-img">
                                <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap" style="height:100%;">
                            </a>
                            <div class="card-body" style="height:230px;">
                                <a href="{{ route('blog.post', $post->id) }}" style="height:165px;">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <p class="card-text">
                                        {{-- {{substr(strip_tags($post->body), 0, 140)}} --}}
                                        @php
                                        // strip tags to avoid breaking any html
                                        $string = strip_tags($post->body);
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
                                <small class="text-muted">{!! date_format(new DateTime($post->publish_date),'d M')!!}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-deck ajax-load" style="display:none;">
            <img class="mx-auto ajax-load d-block mt-5" style="height: 100px;" src="{{ asset('images\loading\1.gif') }}">
        </div>
        @elseif (count($data->post->data) <= 0)
            No Post found in this category.
        @endif
    </div>

    @include('_layouts.sidebar')
</div>
@endsection

@section('script')
{{-- jquery lazy load plugins --}}
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>

<script>
    @if (count($data->post->data) >= 1)
    $(document).ready(function () {
        var page = 1
        let load = true
        let pageHeight = $('#post-list').height()
        $(window).scroll(function() {
            if($(window).scrollTop() >= pageHeight && load) {
                page++
                pageHeight = pageHeight + 250
                loadMoreData(page)
            }
        })

        function loadMoreData(page){
            $.ajax(
                {
                    url: '/blog/post-on-page/{{$categoryName}}/' + page,
                    type: "get",
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                        load = false
                    }
                })
                .done(function(data)
                {
                    if(data.html == " "){
                        $('.ajax-load').html("<p class='text-center nomore-products'><b class='text-uppercase'>No more posts found.</b></p>");
                        return;
                    }
                    load = true
                    $('.ajax-load').hide();
                    $("#post-list").append(data.html)
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    load = false
                    alert('server not responding...')
                }
            );
        }
    })
    @endif
</script>
@endsection