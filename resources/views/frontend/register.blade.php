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
                    <input name="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NAMA PENGGUNA</label>
                    <input name="username" class="form-control" type="text" placeholder="Masukan Nama Pengguna" >
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">EMAIL</label>
                    <input name="email" type="email" class="form-control" placeholder="Masukan Email">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">TELEPONE</label>
                    <input name="phone" type="number" class="form-control" placeholder="Masukan No Telepone">
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">PASSWORD</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Masukan Password">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">KONFIRMASI PASSWORD</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password">
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">TANGGAL LAHIR</label>
                    <input type="date"
                        class="form-control" name="dob" id="dob" aria-describedby="helpId" placeholder="Date of birth">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">JENIS KELAMIN</label>
                    <div class="form-group">
                        <select class="form-control" id="sel1" name="gender">
                            <option value="null">Silahkan Pilih</option>
                            <option value="male">LAKI-LAKI</option>
                            <option value="female">PEREMPUAN</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">ALAMAT</label>
                    <input name="address" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="subdistrict">KECAMATAN</label>
                    <input type="text" class="form-control" name="subdistrict" id="subdistrict" aria-describedby="helpId" placeholder="Subdistrict">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">KOTA</label>
                    <input name="city" type="text" class="form-control" placeholder="Pandean Umbul Harjo">
                </div>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">PROVINSI</label>
                    <input name="province" type="text" class="form-control" placeholder="Provinsi">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">POS</label>
                    <input name="postal_code" type="text" class="form-control" placeholder="Kode Pos">
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
     // add the custom rule here
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
    }, "Value must not equal null.");
    $(document).ready(function () {
        $('#signup-form').validate({
            rules: {
                name: 'required',
                username: 'required',
                email: {
                    required: true,
                    email: true
                },
                phone: 'required',
                gender: {
                    valueNotEquals: 'null'
                },
                dob: 'required',
                address: 'required',
                subdistrict: 'required',
                city: 'required',
                province: 'required',
                postal_code: 'required',
                password: 'required',
                password_confirmation: {
                    required: true,
                    equalTo: '#password'
                }
            }
        });
    })
</script>
@endsection