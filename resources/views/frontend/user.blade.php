@extends('_layouts.wrapper')

@section('heading')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">HOME</a></li>
            <li class="breadcrumb-item active" aria-current="page">SETTING</li>
        </ol>
    </nav>
</div>
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
                <form action="{{ route('member.update') }}" method="post">@csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NAMA</label>
                                <input class="form-control" name="name" type="text" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NAMA PENGGUNA</label>
                                <input class="form-control" name="username" type="text" value="{{ $user->username }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">EMAIL</label>
                                <input type="email" name="email" class="form-control" disabled value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">TELEPON</label>
                                <input type="number" name="phone" class="form-control"disabled value="{{ $user->phone }}"">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">TANGGAL LAHIR</label>
                                <div class="form-group">
                                    <input type="date" name="dob" class="form-control" id="exampleInputPassword1" value="{{ $user->dob }}">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ALAMAT</label>
                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->address }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">KECAMATAN</label>
                                <input type="text" class="form-control" id="subdistrict_text" value="{{ $user->subdistrict }}">
                                <input type="text" name="subdistrict" class="d-none" id="subdistrict_value" value="{{ $user->subdistrict }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">KOTA</label>
                                <input type="text" name="city" class="form-control" id="city" value="{{ $user->city }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">PROVINSI</label>
                                <input type="text" name="province" class="form-control" id="province" value="{{ $user->province }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">POS</label>
                                <input type="text" name="postal_code" class="form-control" id="postal_code" value="{{ $user->postal_code }}">
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
                        <tr>
                            <th scope="row mb-0">10000001</th>
                            <td>16 Agustus 2019</td>
                            <td>PROSES</td>
                            <td >Rp. 180.000</td>
                            <td><button type="button" class="btn btn-outline-dark col-8 float-right">DETAIL</button></td>
                        </tr>
                        <tr>
                            <th scope="row mb-0">10000002</th>
                            <td>16 Agustus 2019</td>
                            <td>TERKIRIM</td>
                            <td >Rp. 180.000</td>
                            <td><button type="button" class="btn btn-outline-dark col-8 float-right">DETAIL</button></td>
                        </tr>
                        <tr>
                            <th scope="row mb-0">10000003</th>
                            <td>16 Agustus 2019</td>
                            <td>TERKIRIM</td>
                            <td >Rp. 180.000</td>
                            <td><button class="btn btn-outline-dark col-8 float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">DETAIL</button>
                            </td>
                        </tr>
                        <tr  class="collapse" id="collapseExample">
                            <td class="expand-table align-bottom">
                                <img src="{{ asset('images\produk\tabel.png') }}">
                                <span class="ml-3 mt-4 float-left">BAJU BOLA CHELSEA </span>
                            </td>
                            <td class="expand-table">SIZE:XL</td>
                            <td class="expand-table">QTY:1</td>
                            <td class="expand-table">Rp. 180.000</td>
                            <td class="expand-table"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
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
    })
</script>
@endsection