@extends('_layouts.wrapper')

@section('heading')
@include('_layouts.breadcrumb')
@endsection

@section('content')
<div class="row">
    <div class="col-5">
        <img class="images-post" src="{{ asset('images\produk\i-1.jpg') }}">
    </div>

    <div class="col-7">

        <div class="col">

            @if (null != $data->data->pre_order)
            <hr class="hr-produk">
            @endif

            <div class="row">
                <div class="col-9 simpleCart_shelfItem">
                    <img style="display:none;" class="item_image" src="{{ $data->data->image }}">
                    <h2 class="headline-detail item_name">{{ $data->data->name }}</h2>
                    <h4>Rp. <span class="item_price">{{ $data->data->price }}</span></h4>

                    @if (null != $data->data->pre_order)
                        <h5>
                            Tanggal Berakhir
                        </h5>
                        <p>{{$data->data->pre_order->end_date}}</p>
                    @endif

                    <br>

                    <h5>
                        DESKRIPSI
                    </h5>
                    <div class="text" style="line-height:1.5;">
                        <p>{!! $data->data->description !!}</p>
                    </div>
                    <br>

                    @if (null != $data->data->pre_order)
                        @if ($data->data->variants[0]->variant != 'ALL SIZE')
                            <h5>
                                PILIH UKURAN
                            </h5>
                            <div class="row col-9 size">
                                @foreach ($data->data->variants as $key => $item)
                                    @php $key++ @endphp
                                    <div class="quantity buttons_added @if ($key%2 != 0) kiri @endif">
                                        <span class="ukuran"> {{$item->variant}}</span>
                                        <input type="button" value="-" class="minus"><input type="number" step="1" min="0" name="s" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                                    </div>
                                    @if ($key%2 == 0 && $key != count($data->data->variants))
                                        </div>
                                        <div class="row col-9 size">
                                    @endif
                                @endforeach
                            </div>
                        @endif
                        {{-- <div class="row col-9 size">
                            <div class="quantity buttons_added kiri">
                                <span class="ukuran"> L</span>
                                <input type="button" value="-" class="minus"><input type="number" step="1" min="0" name="l" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                            </div>
                            <div class="quantity buttons_added">
                                <span class="ukuran"> XL</span>
                                <input type="button" value="-" class="minus"><input type="number" step="1" min="0" name="xl" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                            </div>
                        </div> --}}
                    @elseif (null == $data->data->pre_order)
                        @if ($data->data->variants[0]->variant != 'ALL SIZE')
                            <h5>
                                PILIHAN PRODUK 
                            </h5>
                            <div class="form-group">
                                <select class="form-control col-8" id="sel1" name="sellist1">
                                    <option>Pilih Produk</option>
                                    @foreach($data->data->variants as $item)
                                        <option>{{$item->variant}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="row col-9 size">
                            <div class="quantity buttons_added">
                                <span class="ukuran">QTY</span>
                                <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                            </div>
                        </div>
                    @endif
                    <br>

                    <button type="button" id="sizeChartBtn" data-toggle="modal" data-target="#size_chart_modal" class="btn btn-outline-dark col-8"
                        @if ($data->data->category->size_chart->image == null)
                            disabled
                        @endif
                        >
                        LIHAT TABEL UKURAN
                    </button>
                    <br>
                    <br>

                    <button class="btn btn-dark col-8 bayar item_add" id="addToCart" href="">BAYAR</button>
                    <br>
                    <br>
                    <br>
                </div>
                @if (null != $data->data->pre_order)
                <div class=" col-3 ">
                    <h2 class="badge-text ">
                        PRE-ORDER
                    </h2>
                </div>
                @endif
            </div>

        </div>

    </div>
</div>

<!-- related products -->
<h4 class="section-header_title">PRODUK TERKAIT</h4>
<hr>
<div class="card-deck">
    <div class="card">
        <a href="#">
            <img class="card-img-top gambar" src="{{ asset('images\produk\2.png') }}">
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
            <img class="card-img-top gambar" src="{{ asset('images\produk\1.png') }}">
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
            <img class="card-img-top gambar" src="{{ asset('images\produk\3.png') }}">
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
            <img class="card-img-top gambar" src="{{ asset('images\produk\3.png') }}">
        </a>
        <div class="card-body produk">
            <a href="#">
                <h5 class="card-title">KAOS AIR NIKE STELL</h5>
            </a>
            <p class="card-text">Rp. 150.000</p>
        </div>
    </div>
</div>

<!-- Size Chart Modal -->
<div class="modal fade" id="size_chart_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{$data->data->category->size_chart->image}}" alt="size chart image">
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection