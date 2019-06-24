@extends('_layouts.wrapper')

@section('heading')
<div class="container">
    <div class="row mt-0">
        <div class="breadcrumb col-12 mb-0">
            <div class="col-12">
                <nav class="w-sm-100">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <a class="nav-item "> PENCARIAN :</a>
                        <a class="nav-item nav-link active tabs" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">ARTIKEL</a>
                        <a class="nav-item nav-link tabs" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">PRODUK</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div>
        <br>
        <p>HASIL PENCARIAN KATA "<b>{{$term ?? ""}}</b>"</p>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="tab-content " id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card-deck">
                    @if (isset($data))
                        @foreach ($data as $key => $item)
                            @if (0 === ($key%4))
                                </div>
                                <div class="card-deck">
                            @endif
                            <div class="col-md-3 px-0">
                                <div class="card">
                                    <a href="{{ route('blog.post', $item->searchable->id) }}" class="single-post-a-img">
                                        <img class="card-img-top" src="{{ $item->searchable->image }}" alt="Card image cap" style="height:100%;">
                                    </a>
                                    <div class="card-body" style="height:230px;">
                                        <a href="{{ route('blog.post', $item->searchable->id) }}" style="height:165px;">
                                            <h5 class="card-title">{{$item->title}}</h5>
                                            <p class="card-text">
                                                @php
                                                // strip tags to avoid breaking any html
                                                $string = strip_tags($item->searchable->body);
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
                                        <small class="text-muted">{!! date_format(new DateTime($item->searchable->publish_date),'d M')!!}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card-deck">
                    @if (isset($product))
                        @foreach ($product->data as $key => $item)
                            @if (0 === ($key%4))
                                </div>
                                <div class="card-deck">
                            @endif
                            <div class="col-md-3 px-0">
                                <div class="card">
                                    <a href="{{route('products.single-product', $item->id)}}">
                                        <img class="card-img-top gambar"
                                            src="{{ $item->image }}">
                                    </a>
                                    <div class="card-body produk">
                                        <a href="#">
                                            <h5 class="card-title">{{$item->name}}</h5>
                                        </a>
                                        <p class="card-text">Rp. {{$item->price}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- <img class="mx-auto d-block mt-5 " style="height: 100px;" src="{{ asset('images\loading\1.gif') }}"> --}}
</div>
@endsection