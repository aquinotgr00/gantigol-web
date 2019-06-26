@extends('_layouts.wrapper')

@section('heading')
@include('_layouts.breadcrumb')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3">
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

                <form action="#" method="post" id="shipping-form">
                    <input type="text" class="d-none" name="user_id" id="user_id" @if(isset($user)) value="{{$user->id}}@endif">
                    <input type="number" name="cost" id="shipping_cost" class="d-none">
                    <input type="text" name="shipment_name" id="shipment_name" class="d-none">
                    <input type="number" name="discount" id="discount" class="d-none" value="0">

                    <div class="form-group">
                        <label for="exampleInputEmail1">NAMA</label>
                        <input type="text" name="name" placeholder="Nama" class="form-control"
                                @if(isset($user))
                                    readonly
                                    value="{{ $user->name }}"
                                @endif>
                        <label for="name" generated="true" class="error invalid-feedback"></label>
                    </div>

                    <div class="form-group">
                        <label for="phone">PHONE</label>
                        <input type="number" name="phone" id="phone" placeholder="phone" class="form-control"
                                @if(isset($user))
                                    readonly
                                    value="{{ $user->phone }}"
                                @endif>
                        <label for="phone" generated="true" class="error invalid-feedback"></label>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email"
                                @if(isset($user))
                                    value="{{ $user->email }}"
                                    readonly
                                @endif>
                        <label for="email" generated="true" class="error invalid-feedback"></label>
                    </div>

                    <div class="form-group">
                        <label for="address">ALAMAT</label>
                        <textarea class="form-control" name="address" id="address" rows="3"@if(isset($user)) readonly @endif>@if(isset($user)){{ $user->address }}@endif</textarea>
                        <label for="address" generated="true" class="error invalid-feedback"></label>
                    </div>

                    <div class="form-group">
                        <label for="city">KECAMATAN</label>
                        <input type="text" class="d-none" name="subdistrict_id" id="subdistrict_value"
                                @if(isset($user))
                                    value="{{ $userSubdistrictId }}"
                                @endif>
                        <input type="text" class="form-control" name="subdistrict_text" id="subdistrict_text" placeholder="Kecamatan"
                                @if(isset($user))
                                    value="{{ $user->subdistrict }}"
                                    readonly
                                @endif>
                        <label for="subdistrict_text" generated="true" class="error invalid-feedback"></label>
                    </div>

                    <div class="form-group">
                        <label for="city">KOTA</label>
                        <input type="text" class="d-none" name="city_id" id="city_id">
                        <input type="text" class="form-control" name="city" id="city" placeholder="Kota"
                                @if(isset($user))
                                    value="{{ $user->city }}"
                                    readonly
                                @endif>
                        <label for="city" generated="true" class="error invalid-feedback"></label>
                    </div>

                    <div class="form-group">
                        <label for="province">PROVINSI</label>
                        <input type="text" class="form-control" name="province" id="province" placeholder="Provinsi"
                                @if(isset($user))
                                    value="{{ $user->province }}"
                                    readonly
                                @endif>
                        <label for="province" generated="true" class="error invalid-feedback"></label>
                    </div>

                    <div class="form-group">
                        <label for="postal_code">KODE POS</label>
                        <input type="number" class="form-control" name="postal_code" id="postal_code" placeholder="Kode Pos"
                                @if(isset($user))
                                    value="{{ $user->postal_code }}"
                                    readonly
                                @endif>
                        <label for="postal_code" generated="true" class="error invalid-feedback"></label>
                    </div>

                    @if (!Session::has('token') && !isset($user))
                    <div class="form-group">
                        <p class="form-check-label"><input type="checkbox" name="register_account" class="mr-2">Simpan akun untuk keperluan selanjutnya</p>
                    </div>
                    @endif
            
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <h4 class="section-header_title">PRODUK PILIHAN</h4>
        <hr>
        <div class="row">
            <div class="col-lg-7">
                <label>PRODUK</label>
            </div>
            <div class="col-lg-1 ">
                <label>DISKON</label>
            </div>
            <div class="col-lg-3">
                <label>SUB-TOTAL</label>
            </div>
        </div>

        <div id="checkout-item-list">
            @if (isset($preOrderItems))
                @foreach ($preOrderItems as $key => $value)
                    <div id="checkout-item-${item.id}" class="checkout-list-items">
                        <hr class="hr-light top-line">
                        <div class="row barang">
                            <div class="col-7">
                                <div style="float:left;width:25%;">
                                    <img class="outline" src="{{$value->data->image}}" style="width:100%;" />
                                </div>
                                <div class="detil-barang">
                                    <div>
                                        <span class="judul-barang">{{$value->data->product_name}}</span>
                                    </div>
                                    <div>
                                        <span class="judul-barang">HARGA  </span>
                                        <span> Rp {{$value->data->price}}</span>
                                    </div>
                                    <div>
                                        <span class="judul-barang size-cart">SIZE </span>
                                        <span> {{$value->data->variant}}</span>
                                    </div>
                                    <div>
                                        <span class="judul-barang qty-cart">QTY  </span>
                                        <span>  0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div>
                                    <div class="diskon">0%</div>
                                </div>
                            </div>
                            <div class=" col-3">
                                <div class="harga">Rp. 0</div>
                            </div>
                            <div class="col-1">
                                <a href="#" class="far fa-trash-alt fa-sm barang deleteModal" data-toggle="modal" data-target="#deleteItemModal" data-qty="0" data-price="{{$value->data->price}}" data-id="0"> </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <hr class="hr-light top-line">

        <div class="row">
            <div class="col-12">
                <label>KURIR</label>
                <hr class="hr-light top-line">
                <form action="#" method="post" id="courier-form">
                    <div class="row">
                        <div class="col-4 kurir">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select class="form-control gantigoal-select" name="courier" id="courier">
                                        <option value="null">Pilih Kurir</option>
                                        <option value="jne">JNE</option>
                                        <option value="pos">POS Indonesia</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="jnt">J&T</option>
                                    </select>
                                    <label for="courier" generated="true" class="error invalid-feedback">This field is required.</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 kurir">
                            <div class="dropdown">
                                <div class="form-group">
                                    <input type="number" name="weight" id="weight" class="d-none">
                                    <select class="gantigoal-select" name="courier_type" id="courier_type" disabled>
                                        <option value=0>Jenis pengiriman</option>
                                    </select>
                                    <label for="courier_type" generated="true" class="error invalid-feedback"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            Rp. <span class="courier_fee">0</span>
                        </div>
                        <div class="col-12">
                            <div class="row mt-0">
                                <div class="col-12">
                                    <hr class="hr-light top-line mt-2">
                                </div>
                                <div class=" col-4">
                                    <div class="form-group">
                                        <input class="form-control" id="promo-code" name="promo-code" type="text" placeholder="Masukkan Kode Kupon" >
                                        <label for="promo-code" class="error invalid-feedback promo-error">Silahkan Masukan Kode Promo</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="button" id="promo-code-btn" class="btn btn-outline-dark promo-apply-btn col-12">GUNAKAN</button>
                                </div>
                            </div>     
                        </div>
                    </div>
                </form>
                <hr class="hr-light bottom-line" style="margin-top:1.5%;">
                <div class="row">
                    <div class="col-8">
                        <div>
                            <label class="float-sm-right">DISKON</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            Rp. <span class="discount_text">0</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-8">
                        <div>
                            <label class="float-sm-right">TOTAL</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div><span class="total_price d-none">0</span>
                            Rp. <span class="total_price_text">0</span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark col-12 bayar">BAYAR</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Item Modal -->
<div class="modal fade" id="deleteItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
                <button type="button" data-dismiss="modal" class="btn btn-dark simpleCart_remove" id="deleteButton" data-id="0" data-price="0" data-qty="0">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script
    type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-Mk0Qk3hlWbNXlXV_"
></script>
<script>
    $(document).ready(function () {
        $.validator.addMethod( "phoneID", function( value, element ) {
            return this.optional( element ) || /^((?:\+62|62)|0)[2|8]{1}[0-9]+$/g.test( value );
        }, "Please specify a valid phone number." )
        $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg !== value;
        }, "Value must not equal null.");
        /* Fungsi formatRupiah */
        function formatRupiah(angka){
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split       = number_string.split(','),
            sisa        = split[0].length % 3,
            rupiah        = split[0].substr(0, sisa),
            ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }

        $(document).on("click", ".deleteModal", function () {
            var itemID = $(this).data('id')
            var itemPrice = $(this).data('price')
            var itemQty = $(this).data('qty')
            $(".modal-footer #deleteButton").data('id', itemID)
            $(".modal-footer #deleteButton").data('price', itemPrice)
            $(".modal-footer #deleteButton").data('qty', itemQty)
        });

        function getCourierCost(id, courier) {
            let weight = $('#weight').val()
            $.ajax({
                url: '/api/carts/courier-cost/'+ id + '/' + courier + '/' + weight,
                type: 'GET',
                success: res => {
                    res.map(item => {
                        $('#courier_type').append(new Option(item.service, item.cost[0].value))
                    })
                }
            })
        }

        function updateTotalCheckout() {
            let total = parseInt($('.total_price').html())
            let courier = parseInt($('#courier_type').val())
            let discount = $('#discount').val()
            let all = total + courier
            if (all >= discount) {
                $('.total_price_text').html(formatRupiah(total + courier - discount))
            } else if (all < discount) {
                $('.total_price_text').html(formatRupiah(0))
            }
        }

        if ($('#subdistrict_text').val() != '' && $('#subdistrict_value').val() == '') {
            $.ajax({
                url: '/api/subdistrict',
                type: 'GET',
                data: {
                    term: $('#subdistrict_text').val()
                },
                success: res => {
                    $('#city_id').val(res[0].city_id)
                }
            })
        }

        let promoApplied = false
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
                // $('#courier').empty().append(new Option('Pilih Kurir', 'null'))
                // ui.item.courier.map(courier => {
                //     $('#courier').append(new Option(courier, courier))
                // })
                $('#subdistrict_value').val(ui.item.id)
                $('#city').val(ui.item.city)
                $('#city_id').val(ui.item.city_id)
                $('#province').val(ui.item.province)
                $('#postal_code').val(ui.item.postal_code)
            }
        });

        $('#courier').change(() => {
            $('#courier_type').attr('disabled', true)
            $('#courier_type').empty().append(new Option("Jenis pengiriman", 0))
            $('.courier_fee').html(formatRupiah($('#courier_type').val()))
            updateTotalCheckout()
            if ($('#courier').val() !== 'null') {
                $('#courier').removeClass('is-invalid')
                $('label[for=courier]').css('display', 'none')
                $('input[name=shipment_name]').val($('#courier').val())
                let courier = $('#courier').val()
                let subdistrict_id = $('#subdistrict_value').val()
                getCourierCost(subdistrict_id, courier)
                $('#courier_type').attr('disabled', false)
            }
        })

        $('#differentAddress').on('change', function() {
            $('input[name=name]').prop('readonly', function(i, v) { return !v; })
            $('input[name=phone]').prop('readonly', function(i, v) { return !v; })
            $('input[name=email]').prop('readonly', function(i, v) { return !v; })
            $('textarea[name=address]').prop('readonly', function(i, v) { return !v; })
            $('input[name=province]').prop('readonly', function(i, v) { return !v; })
            $('input[name=city]').prop('readonly', function(i, v) { return !v; })
            $('input[name=subdistrict_text]').prop('readonly', function(i, v) { return !v; })
            $('input[name=postal_code]').prop('readonly', function(i, v) { return !v; })
        })

        $('#courier_type').change(() => {
            $('.courier_fee').html(formatRupiah($('#courier_type').val()))
            $('input[name=cost]').val($('#courier_type').val())
            updateTotalCheckout()
        })

        $('.bayar').click(evt => {
            evt.preventDefault()
            if (!$('#shipping-form').valid()) { // Not Valid
                return;
            }
            if ($('#courier').val() === 'null' || $('#courier_type').val() === 'null') {
                $('#courier').addClass('is-invalid');
                $('label[for=courier]').css('display', 'block')
                return;
            }
            let isLimit = false
            $('.checkout-qty-items').map((key, item) => {
                if (item.dataset.val < 0) {
                    isLimit = true
                }
            })
            if (isLimit) {
                return;
            }
            $('#shipping-form').submit()
        })

        $('#promo-code-btn').click(() => {
            let beforeDiscount = parseInt($('.total_price').html())
            let reward = 0
            if ($('#promo-code').val() === '') {
                $('#promo-code').addClass('is-invalid')
                $('.promo-error').addClass('d-block')
                return;
            }
            if (!promoApplied && $('#promo-code').val() !== '') {
                $('#promo-code').removeClass('is-invalid')
                $('.promo-error').removeClass('d-block')
                $('#promo-code-btn').html('BATALKAN')
                $('#promo-code').attr('disabled', true)
                let promo = $('input[name=promo-code]').val()
                $.ajax({
                    url: '/api/carts/apply-promo',
                    type: 'POST',
                    data: {
                        promo: promo
                    },
                    success: res => {
                        reward = res.reward
                        $('#discount').val(reward)
                        $('.discount_text').html(formatRupiah(reward))
                        updateTotalCheckout()
                        promoApplied = true
                    }
                })
            } else if (promoApplied) {
                reward = parseInt($('#discount').val())
                $('#promo-code').val('')
                $('#promo-code').attr('disabled', false)
                $('.discount_text').html(0)
                $('#promo-code-btn').html('GUNAKAN')
                $('#discount').val(0)
                updateTotalCheckout()
                promoApplied = false
            }
        })
        
        $('#shipping-form').validate({
            highlight: function(element, errorClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass('is-invalid');
            },
            rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    phoneID: true
                },
                address: 'required',
                subdistrict_text: 'required',
                city: 'required',
                province: 'required',
                postal_code: 'required',
            },
            submitHandler: function (evt) {
                let url = '/api/carts/checkout'
                let shipping = $('#shipping-form').serialize()
                @if (Request::is('checkout-preorder'))
                    url = '/api/carts/checkout-preorder'
                @endif
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        session: localStorage.getItem('session'),
                        shipping: shipping,
                    },
                    success: res => {
                        $.post('/charge',JSON.stringify(res), function(success) {
                            const charge = JSON.parse(success)
                            snap.pay(charge.token, {
                                onSuccess: function(result){
                                    // handlePaymentResponse(result);
                                    window.location = '/thanks';
                                },
                                onPending: function(result){
                                    console.log('pending');
                                    // handlePaymentResponse(result);
                                    window.location = '/thanks';
                                },
                                onError: function(result){
                                    console.log('error');
                                    // handlePaymentResponse(result);
                                },
                                onClose: function(){console.log('customer closed the popup without finishing the payment');}
                            });
                        })
                    }
                })
            }
        })
    })
</script>
@endsection