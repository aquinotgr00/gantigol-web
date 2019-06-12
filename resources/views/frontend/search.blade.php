@extends('_layouts.wrapper')

@section('heading')
<div class="container">
    <div class="row mt-0">
        <div class="breadcrumb col-12 mb-0">
            <div class="col-12">
                <nav>
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
        <p>HASIL PENCARIAN KATA "<b>{{$term}}</b>"</p>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="tab-content " id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card-deck">
                    @foreach ($data as $key => $item)
                        @if (0 === ($key%4))
                            </div>
                            <div class="card-deck">
                        @endif
                        <div class="card col-md-3 px-0">
                            <a href="{{ route('blog.post', $item->searchable->id) }}">
                                <img class="card-img-top" src="{{ asset('images\content\2.png') }}" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{$item->title}}</h5>
                                <p class="card-text">{{strip_tags($item->searchable->body)}}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card-deck">
                    <div class="card">
                        <a href="#">
                            <img class="card-img-top gambar"
                                src="{{ asset('images\produk\2.png') }}">
                        </a>
                        <div class="card-body produk">
                            <a href="#">
                                <h5 class="card-title">KAOS AIR NIKE STELL</h5>
                            </a>
                            <p class="card-text">Rp. 150.000</p>
                        </div>
                    </div>
                    <div class="card">
                        <a href="#">
                            <img class="card-img-top gambar"
                                src="{{ asset('images\produk\1.png') }}">
                        </a>
                        <div class="card-body produk">
                            <a href="#">
                                <h5 class="card-title">KAOS AIR NIKE STELL</h5>
                            </a>
                            <p class="card-text">Rp. 150.000</p>
                        </div>
                    </div>
                    <div class="card">
                        <a href="#">
                            <img class="card-img-top gambar"
                                src="{{ asset('images\produk\3.png') }}">
                        </a>
                        <div class="card-body produk">
                            <a href="#">
                                <h5 class="card-title">KAOS AIR NIKE STELL</h5>
                            </a>
                            <p class="card-text">Rp. 150.000</p>
                        </div>
                    </div>
                    <div class="card">
                        <a href="#">
                            <img class="card-img-top gambar"
                                src="{{ asset('images\produk\3.png') }}">
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
        </div>
    </div>
    <br>
    {{-- <img class="mx-auto d-block mt-5 " style="height: 100px;" src="{{ asset('images\loading\1.gif') }}"> --}}
</div>
@endsection