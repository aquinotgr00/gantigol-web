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
    <div class="col-3">
        <h4 class="section-header_title">DATA PENGIRIMAN</h4>
        <hr>
        <div class="bs-example">
            @if (!Session::has('token') && !isset($user))
                <form action="/signin" id="checkout-login-form" class="form d-none" method="POST">@csrf
                    <input type="text" name="cart_session" id="cartSession" class="d-none" value="valuee">
                    <p><a href="#" class="checkout_login_btn"><u>Kembali</u></a></p>
                    <div class="form-group">
                        <label for="username">EMAIL</label>
                        <input type="email" name="username" class="form-control" id="username" placeholder="Email">
                        <label for="username" generated="true" class="error invalid-feedback"></label>
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password" generated="true" class="error invalid-feedback"></label>
                    </div>
                    <div class="form-group">
                        <div class="card">
                            <button type="submit" class="btn btn-dark">LOGIN</button>
                        </div>
                    </div>

                    <a class="link-text" href="#">
                        <p>Lupa Password?</p>
                    </a>
                </form>
            @endif

            <div class="register_form_group">
                @if (!Session::has('token') && !isset($user))
                    <p>
                        Sudah punya akun?<a href="#" class="checkout_login_btn"><u class="ml-2">LOGIN</u></a>
                    </p>
                @elseif (Session::has('token') && isset($user))
                    <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="differentAddress" id="differentAddress" value="checkedValue">
                        <p>Gunakan alamat pengiriman beda.</p>
                    </label>
                    </div>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">NAMA</label>
                    <input class="form-control" type="text" name="name" placeholder="Nama"
                            @if(isset($user))
                                value="{{ $user->name }}"
                                disabled
                            @endif>
                </div>

                <div class="form-group">
                    <label for="phone">PHONE</label>
                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="phone"
                            @if(isset($user))
                                value="{{ $user->phone }}"
                                disabled
                            @endif>
                </div>

                <div class="form-group">
                    <label for="address">ALAMAT</label>
                    <textarea class="form-control" name="address" id="address" rows="3"@if(isset($user)) disabled @endif>@if(isset($user)){{ $user->address }}@endif</textarea>
                </div>

                <div class="form-group">
                    <label for="city">KECAMATAN</label>
                    <input type="text" class="d-none" name="subdistrict" id="subdistrict_value">
                    <input type="text" class="form-control" name="subdistrict" id="subdistrict_text" placeholder="Kecamatan"
                            @if(isset($user))
                                value="{{ $user->subdistrict }}"
                                disabled
                            @endif>
                </div>

                <div class="form-group">
                    <label for="city">KOTA</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Kota"
                            @if(isset($user))
                                value="{{ $user->city }}"
                                disabled
                            @endif>
                </div>

                <div class="form-group">
                    <label for="province">PROVINSI</label>
                    <input type="text" class="form-control" name="province" id="province" placeholder="Provinsi"
                            @if(isset($user))
                                value="{{ $user->province }}"
                                disabled
                            @endif>
                </div>

                <div class="form-group">
                    <label for="postal_code">KODE POS</label>
                    <input type="number" class="form-control" name="postal_code" id="postal_code" placeholder="Kode Pos"
                            @if(isset($user))
                                value="{{ $user->postal_code }}"
                                disabled
                            @endif>
                </div>

                @if (!Session::has('token') && !isset($user))
                <div class="form-group">
                    <p class="form-check-label"><input type="checkbox" class="mr-2">Buat akun untuk keperluan selanjutnya</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-9">
        <h4 class="section-header_title">PRODUK PILIHAN</h4>
        <hr>
        <div class="row">
            <div class="col-7">
                <label>PRODUK</label>
            </div>
            <div class="col-1 ">
                <label>DISKON</label>
            </div>
            <div class="col-3">
                <label>SUB-TOTAL</label>
            </div>
        </div>

        {{-- @foreach ($cartItems as $item)
            <hr class="hr-light top-line">
            <div class="row barang">
                <div class="col-7">
                    <div>
                        <div>
                            <img class="outline" src="{{ asset('images\produk\p1.png') }}" />
                        </div>
                        <div class="detil-barang">
                            <div>
                                <span class="judul-barang">{{ $item->product_id }}</span>
                            </div>
                            <div>
                                <span class="judul-barang">HARGA  </span>
                                <span> Rp {{ $item->price }}</span>
                            </div>
                            <div>
                                <span class="judul-barang size-cart">SIZE </span>
                                <span> XL</span>
                            </div>
                            <div>
                                <span class="judul-barang qty-cart">QTY  </span>
                                <span>  {{ $item->qty }}</span>
                            </div>
                            <div class="quantity buttons_added">
                                <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="{{ $item->qty }}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-1 ">

                    <div>
                        <div class="diskon">
                            0%
                        </div>
                    </div>
                </div>
                <div class=" col-3">
                    <div class="harga">Rp. {{ $item->price*$item->qty }}</div>
                </div>
                <div class="col-1">
                    <a href="" class="far fa-trash-alt fa-sm barang"> </a>
                </div>
                <div>
                </div>
            </div>
        @endforeach --}}
        <div id="checkout-item-list">
        </div>

        <hr class="hr-light top-line">

        <div class="row">
            <div class="col-12">
                <label>KURIR</label>
                <hr class="hr-light top-line">
                <div class="row">
                    <div class="col-4 kurir">
                        <div class="dropdown">
                            <div class="form-group">
                                <select class="gantigoal-select" name="courier" id="courier">
                                    <option>Pilih Kurir</option>
                                    <option>JNE</option>
                                    <option>TIKI</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 kurir">
                        <div class="dropdown">
                            <div class="form-group">
                                <select class="gantigoal-select" name="courier-type" id="courier-type">
                                    <option>Jenis pengiriman</option>
                                    <option>YES</option>
                                    <option>OKE</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 courier_fee">
                        Rp. 0
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <hr class="hr-light top-line mt-2">
                            </div>
                            <div class=" col-4">
                                <div class="form-group">
                                    <input class="form-control" id="promo-code" name="promo-code" type="text" placeholder="Masukkan Kode Kupon" >
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="button" id="promo-code-btn" class="btn btn-outline-dark col-12">TERAPKAN</button>
                            </div>
                        </div>     
                    </div>
                </div>
                <hr class="hr-light bottom-line">
                <div class="col-10 pr-5 text-right">
                    <div>
                        <label class="pr-4">DISKON
                        </label>
                        <span class="discount">Rp. 80.000</span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="col-10 pr-5 text-right">
                    <div>
                        <label class="pr-4">TOTAL
                        </label>
                        <span class="total_price">Rp. 100.000</span>
                    </div>
                </div>
                <button class="btn btn-dark col-12 bayar">BAYAR</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.checkout_login_btn').click(evt => {
            evt.preventDefault()
            $('#checkout-login-form').toggleClass('d-none')
            $('.register_form_group').toggleClass('d-none')
        })

        $('#checkout-login-form').validate({
            highlight: function(element, errorClass) {
                $(element).addClass('is-invalid')
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass('is-invalid')
            },
            rules: {
                username: {
                    required: true,
                    email: true
                },
                password: 'required'
            }
        });
        
        $("#subdistrict_text").autocomplete({
            source: "/api/subdistrict",
            minLength: 3,
            select: function( event, ui ) {
                $('#subdistrict_value').val(ui.item.value)
                $('#city').val(ui.item.city)
                $('#province').val(ui.item.province)
                $('#postal_code').val(ui.item.postal_code)
            }
        });

        $('#differentAddress').on('change', function() {
            $('input[name=name]').prop('disabled', function(i, v) { return !v; })
            $('input[name=phone]').prop('disabled', function(i, v) { return !v; })
            $('textarea[name=address]').prop('disabled', function(i, v) { return !v; })
            $('input[name=province]').prop('disabled', function(i, v) { return !v; })
            $('input[name=city]').prop('disabled', function(i, v) { return !v; })
            $('input[name=subdistrict]').prop('disabled', function(i, v) { return !v; })
            $('input[name=postal_code]').prop('disabled', function(i, v) { return !v; })
        })

        $('.bayar').click(evt => {
            evt.preventDefault()
            window.location = '/thanks'
        })

        $('#promo-code-btn').click(() => {
            let promo = $('input[name=promo-code]').val()
            $.ajax({
                url: '/api/carts/apply-promo',
                type: 'POST',
                data: {
                    promo: promo
                },
                success: res => {
                    console.log(res)
                }
            })
        })
    })
</script>
@endsection