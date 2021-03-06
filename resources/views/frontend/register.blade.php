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
<br>
@endsection

@section('content')
    <h4 class="section-header_title">REGISTER</h4>
    <hr>
    <form id="signup-form" action="/signup" method="post">@csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">NAMA</label>
                    <input name="name" type="text" class="form-control" value="{{old('name')}}" aria-describedby="emailHelp" placeholder="Nama">
                    <label for="name" generated="true" class="error invalid-feedback"></label>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NAMA PENGGUNA</label>
                    <input name="username" class="form-control" value="{{old('name')}}" type="text" placeholder="Masukan Nama Pengguna" >
                    <label for="username" generated="true" class="error invalid-feedback"></label>
                    @if (session('errors'))
                        @foreach(session('errors') as $errorName => $value)
                            @if ($errorName == 'username')
                                <label class="error invalid-feedback d-block">
                                    {{ $value[0] }}
                                </label>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">EMAIL</label>
                    <input name="email" type="email" value="{{old('email')}}" class="form-control" placeholder="Masukan Email">
                    <label for="email" generated="true" class="error invalid-feedback"></label>
                    @if (session('errors'))
                        @foreach(session('errors') as $errorName => $value)
                            @if ($errorName == 'email')
                                <label class="error invalid-feedback d-block">
                                    {{ $value[0] }}
                                </label>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">TELEPON</label>
                    <input name="phone" type="number" value="{{old('phone')}}" class="form-control" placeholder="Masukan No Telepon">
                    <label for="phone" generated="true" class="error invalid-feedback"></label>
                    @if (session('errors'))
                        @foreach(session('errors') as $errorName => $value)
                            @if ($errorName == 'phone')
                                <label class="error invalid-feedback d-block">
                                    {{ $value[0] }}
                                </label>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="checkout-password">PASSWORD</label>
                    <input name="password" type="password" class="form-control" id="checkout-password" placeholder="Masukan Password">
                    <label for="checkout-password" generated="true" class="error invalid-feedback"></label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">KONFIRMASI PASSWORD</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password">
                    <label for="password_confirmation" generated="true" class="error invalid-feedback"></label>
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">TANGGAL LAHIR</label>
                    <input type="date" class="form-control" value="{{old('dob')}}" name="dob" id="dob" max="2001-01-02" aria-describedby="helpId" placeholder="Date of birth">
                    <label for="dob" generated="true" class="error invalid-feedback"></label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">JENIS KELAMIN</label>
                    <div class="form-group">
                        <select class="form-control" id="sel1" name="gender">
                            <option value="null">Silahkan Pilih</option>
                            <option {{old('gender') == 'male' ? 'selected':''}} value="male">LAKI-LAKI</option>
                            <option {{old('gender') == 'female' ? 'selected':''}} value="female">PEREMPUAN</option>
                        </select>
                        <label for="sel1" generated="true" class="error invalid-feedback"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">ALAMAT</label>
                    <input name="address" value="{{old('address')}}" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat">
                    <label for="address" generated="true" class="error invalid-feedback"></label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="subdistrict">KECAMATAN</label>
                    <input type="text" class="form-control" value="{{old('subdistrict')}}" name="subdistrict_text" id="subdistrict_text" aria-describedby="helpId" placeholder="Subdistrict">
                    <input type="text" class="d-none" value="{{old('subdistrict')}}" name="subdistrict" id="subdistrict_value">
                    <label for="subdistrict_text" generated="true" class="error invalid-feedback"></label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">KOTA</label>
                    <input name="city" type="text" value="{{old('city')}}" class="form-control" id="city" placeholder="Pandean Umbul Harjo">
                    <label for="city" generated="true" class="error invalid-feedback"></label>
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">PROVINSI</label>
                    <input name="province" type="text" value="{{old('province')}}" id="province" class="form-control" placeholder="Provinsi">
                    <label for="province" generated="true" class="error invalid-feedback"></label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">POS</label>
                    <input name="postal_code" type="text" value="{{old('postal_code')}}" id="postal_code" class="form-control" placeholder="Kode Pos">
                    <label for="postal_code" generated="true" class="error invalid-feedback"></label>
                </div>
            </div>
            <div class="col-12">
                <br><br>
                <button type="submit" class="btn btn-dark col-12 bayar">REGISTER</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script>
    $.extend($.validator.messages, {
            required: "Wajib diisi."
        });
     // add the custom rule here
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
    }, "Wajib diisi.")
    jQuery.validator.addMethod("nowhitespace", function(value, element) {
        return this.optional(element) || /^\S+$/i.test(value);
    }, "Tidak boleh ada spasi")
    jQuery.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^\w+$/i.test(value);
    }, "Hanya boleh huruf, angka, spasi atau underscore.")
    $.validator.addMethod( "phoneID", function( value, element ) {
        // return this.optional( element ) || /^\+?([ -]?\d+)+|\(\d+\)([ -]\d+)$/.test( value );
        return this.optional( element ) || /^((?:\+62|62)|0)[2|8]{1}[0-9]+$/g.test( value );
    }, "Masukan nomor telepon yang valid" )
    $.validator.addMethod("minAge", function(value, element, min) {
        var today = new Date()
        var birthDate = new Date(value)
        var age = today.getFullYear() - birthDate.getFullYear()
    
        if (age > min+1) {
            return true
        }
    
        var m = today.getMonth() - birthDate.getMonth()
    
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--
        }
    
        return age >= min
    }, "Kamu belum cukup umur!")
    $(document).ready(function () {
        $( "#subdistrict_text" ).autocomplete({
            source: "/api/subdistrict",
            minLength: 3,
            select: function( event, ui ) {
                $('#subdistrict_value').val(ui.item.value)
                $('#city').val(ui.item.city)
                $('#province').val(ui.item.province)
                $('#postal_code').val(ui.item.postal_code)
            }
        });

        $('#signup-form').validate({
            highlight: function(element, errorClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass('is-invalid');
            },
            rules: {
                name: 'required',
                username: {
                    required: true,
                    alphanumeric: true,
                    nowhitespace: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    phoneID: true
                },
                gender: {
                    valueNotEquals: 'null'
                },
                dob: {
                    required: true,
                    minAge: 16
                },
                address: 'required',
                subdistrict_text: 'required',
                city: 'required',
                province: 'required',
                postal_code: 'required',
                password: 'required',
                password_confirmation: {
                    required: true,
                    equalTo: '#checkout-password'
                }
            }
        });
    })
</script>
@endsection