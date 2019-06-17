@extends('_layouts.wrapper')

@section('heading')
@include('_layouts.breadcrumb')
@endsection

@section('content')
<div class="row">
    <div class="col-9"> 
         <div class="card-deck mt-0">
            @foreach ($posts as $post)
            <div class="col-md-4 px-0">
                <div class="card">
                    <a href="{{route('blog.post', $post->id)}}" style="height:165px;">
                        <img class="card-img-top" src="{{ $post->image }}" alt="Card image cap" style="height:100%;">
                    </a>
                    <div class="card-body" style="height:230px;">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{substr(strip_tags($post->body), 0, 120)}}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{!! date_format(new DateTime($post->publish_date),'d M')!!}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="card-deck">
            <img class="  mx-auto d-block mt-5 " style="height: 100px;" src="{{ asset('images\loading\1.gif') }}">
        </div> --}}
    </div>

    @include('_layouts.sidebar')
</div>
@endsection

@section('script')
    {{-- jquery lazy load plugins --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
@endsection