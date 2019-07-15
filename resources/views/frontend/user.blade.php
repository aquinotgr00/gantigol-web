@extends('_layouts.wrapper')

@section('heading')
@include('_layouts.breadcrumb')
@endsection

@section('content')
<div class="row mt-0">
    <div class="breadcrumb col-12 mb-0 pt-0">
        <div class="col-12">
            <nav class="w-sm-100">
                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active tabs" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                    <img class="mr-2 mt-1" src="{{ asset('images\icon\user.svg') }}">DATA PENGGUNA</a>
                    <a class="nav-item nav-link tabs" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <img class="mr-2 mt-1" src="{{ asset('images\icon\history.svg') }}">RIWAYAT PEMBELIAN</a>
                </div>
            </nav>
        </div>
    </div>
</div>
<div>
    <br>
</div>

<div class="row">
    <div class="col-12">
        <div class="tab-content " id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                @if (Session::has('success'))
                <b class="text-success">{{Session::get('success')}}</b><span></span>
                @endif
                <form action="{{ route('member.update') }}" id="update-form" method="post">@csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NAMA</label>
                                <input class="form-control" name="name" type="text" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NAMA PENGGUNA</label>
                                <input class="form-control" name="username" type="text" value="{{ $user->username }}" readonly>
                                <label for="username" generated="true" class="error invalid-feedback"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">EMAIL</label>
                                <input type="email" name="email" class="form-control" disabled value="{{ $user->email }}">
                                <label for="email" generated="true" class="error invalid-feedback"></label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">TELEPON</label>
                                <input type="number" name="phone" class="form-control"disabled value="{{ $user->phone }}">
                                <label for="phone" generated="true" class="error invalid-feedback"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">TANGGAL LAHIR</label>
                                <div class="form-group">
                                    <input type="date" name="dob" class="form-control" id="exampleInputPassword1" value="{{ $user->dob }}">
                                    <label for="dob" generated="true" class="error invalid-feedback"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">JENIS KELAMIN</label>
                                <div class="form-group">
                                    <select class="form-control" id="sel1" name="gender">
                                        <option value="null">Silahkan Pilih</option>
                                        <option value="male" @if ($user->gender == 'male') selected="selected" @endif>LAKI-LAKI</option>
                                        <option value="female" @if ($user->gender == 'female') selected="selected" @endif>PEREMPUAN</option>
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
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->address }}">
                                <label for="address" generated="true" class="error invalid-feedback"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">KECAMATAN</label>
                                <input type="text" class="form-control" id="subdistrict_text" value="{{ $user->subdistrict }}">
                                <input type="text" name="subdistrict" class="d-none" id="subdistrict_value" value="{{ $user->subdistrict }}">
                                <label for="subdistrict_text" generated="true" class="error invalid-feedback"></label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">KOTA</label>
                                <input type="text" name="city" class="form-control" id="city" value="{{ $user->city }}">
                                <label for="city" generated="true" class="error invalid-feedback"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">PROVINSI</label>
                                <input type="text" name="province" class="form-control" id="province" value="{{ $user->province }}">
                                <label for="province" generated="true" class="error invalid-feedback"></label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">POS</label>
                                <input type="text" name="postal_code" class="form-control" id="postal_code" value="{{ $user->postal_code }}">
                                <label for="postal_code" generated="true" class="error invalid-feedback"></label>
                            </div>
                        </div>
                        <div class="col-12">
                            <br><br>
                            <button type="submit" class="btn btn-dark col-12 bayar">UBAH</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <!-- baju -->
                <div>
                    <div class="row mt-0">
                        <div class="col-3">
                            <form action="/action_page.php">
                                <div class="form-group">
                                    <select class="form-control" id="sel1" name="sellist1">
                                        <option>SORT BY</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-9">
                            <div class="col-lg-6 mb-0 float-right ">
                                <div class="input-group">
                                    <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                                        aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><label class="mb-0">NO TRANSAKSI</label></th>
                            <th scope="col"><label class="mb-0">TANGGAL</label></th>
                            <th scope="col"><label class="mb-0">STATUS</label></th>
                            <th scope="col"><label class="mb-0 ">TOTAL HARGA</label></th>
                            <th scope="col"><label class="mb-0 "></label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history->regular as $order)
                            <tr>
                                <th scope="row mb-0">{{$order->invoice_id}}</th>
                                <td>{!! date_format(new DateTime($order->created_at),'d M')!!}</td>
                                <td>{{$order->invoice_status}}</td>
                                <td >Rp. {{ \AppHelper::instance()->rupiah($order->total_amount) }}</td>
                                <td><button class="btn btn-outline-dark col-8 float-right" type="button" data-toggle="collapse" data-target="#collapse-{{$order->id}}" aria-expanded="false" aria-controls="collapse-{{$order->id}}">DETAIL</button>
                                </td>
                            </tr>
                            @foreach ($order->items as $item)
                            <tr class="collapse" id="collapse-{{$order->id}}">
                                <td class="expand-table align-bottom">
                                    <img src="{{ $item->product_variant->image }}">
                                    <span class="ml-3 mt-4 float-left">{{$item->product_variant->name}} </span>
                                </td>
                                <td class="expand-table">SIZE:{{$item->product_variant->variant}}</td>
                                <td class="expand-table">QTY:{{$item->qty}}</td>
                                <td class="expand-table">Rp. {{ \AppHelper::instance()->rupiah($item->price) }}</td>
                                <td class="expand-table"></td>
                            </tr>
                            @endforeach
                        @endforeach
                        @foreach ($history->preorder as $order)
                            <tr>
                                <th scope="row mb-0">PREORDER: {{$order->invoice}}</th>
                                <td>{!! date_format(new DateTime($order->created_at),'d M')!!}</td>
                                <td>{{$order->status}}</td>
                                <td >Rp. {{ \AppHelper::instance()->rupiah($order->amount) }}</td>
                                <td><button class="btn btn-outline-dark col-8 float-right" type="button" data-toggle="collapse" data-target="#preorder-{{$order->id}}" aria-expanded="false" aria-controls="preorder-{{$order->id}}">DETAIL</button>
                                </td>
                            </tr>
                            @foreach ($order->orders as $item)
                                <tr class="collapse" id="preorder-{{$order->id}}">
                                    <td class="expand-table align-bottom">
                                        <img src="{{ $item->product_variant->product->image }}">
                                        <span class="ml-3 mt-4 float-left">{{$item->product_variant->name}} </span>
                                    </td>
                                    <td class="expand-table">SIZE:{{$item->model}}</td>
                                    <td class="expand-table">QTY:{{$item->qty}}</td>
                                    <td class="expand-table">Rp. {{ \AppHelper::instance()->rupiah($item->price) }}</td>
                                    <td class="expand-table"></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

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

        $('#update-form').validate({
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
            }
        });
    })
</script>
@endsection