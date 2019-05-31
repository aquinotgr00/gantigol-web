@extends('_layouts.wrapper')

@section('heading')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">HOME</a></li>
            <li class="breadcrumb-item active" aria-current="page">KLUB</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-5">
        <img class="images-post" src="{{ asset('images\produk\i-1.jpg') }}">
    </div>
    <!-- sidebar< -->
    <div class="side-bar"></div>

    <div class="col-7">

        <div class="side-bar"></div>

        <div class="col">

            <hr class="hr-produk">

            <div class="row">
                <div class="col-9 simpleCart_shelfItem">
                    <img style="display:none;" class="item_image" src="{{ asset('images\produk\i-1.jpg') }}">
                    <h2 class="headline-detail item_name">{{ $data->product->name }}</h2>
                    <h4>Rp. <span class="item_price">{{ $data->product->price }}</span></h4>
                    <h5>
                        Tanggal Berakhir
                    </h5>
                    <p>22 Januari 2020</p>
                    <br>
                    <h5>
                        DESKRIPSI
                    </h5>
                    <div class="text item_desc">
                        <p>{{ $data->product->description }}</p>
                    </div>
                    <br>
                    <h5>
                        PILIH UKURAN
                    </h5>

                    <div class="row col-9 size">
                        <div class="quantity buttons_added kiri">
                            <span class="ukuran"> S</span>
                            <input type="button" value="-" class="minus"><input type="number" step="1" min="0" name="s" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                        </div>
                        <div class="quantity buttons_added">
                            <span class="ukuran"> M</span>
                            <input type="button" value="-" class="minus"><input type="number" step="1" min="0" name="m" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                        </div>
                    </div>

                    <div class="row col-9 size">
                        <div class="quantity buttons_added kiri">
                            <span class="ukuran"> L</span>
                            <input type="button" value="-" class="minus"><input type="number" step="1" min="0" name="l" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                        </div>
                        <div class="quantity buttons_added">
                            <span class="ukuran"> XL</span>
                            <input type="button" value="-" class="minus"><input type="number" step="1" min="0" name="xl" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                        </div>
                    </div>

                    <div class="row col-9 size">
                        <div class="quantity buttons_added kiri">
                            <span class="ukuran"> XXL</span>
                            <input type="button" value="-" class="minus"><input type="number" step="1" min="0" name="xxl" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                        </div>
                        <div class="quantity buttons_added">
                            <span class="ukuran"> XXXL</span>
                            <input type="button" value="-" class="minus"><input type="number" step="1" min="0" name="xxxl" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-outline-dark col-8">LIHAT TABEL UKURAN</button>
                    <br>
                    <br>
                    <button class="btn btn-dark col-8 bayar item_add" id="addToCart" href="">BAYAR</button>
                    <br>
                    <br>
                    <br>
                </div>
                <div class=" col-3 ">
                    <h2 class="badge-text ">
                        PRE-ORDER
                    </h2>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- baju -->
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
@endsection