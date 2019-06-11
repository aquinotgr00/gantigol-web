@extends('_layouts.wrapper')

@section('heading')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">HOME</a></li>
            <li class="breadcrumb-item active" aria-current="page">RESET PASSWORD</li>
        </ol>
    </nav>
</div>
<br>
@endsection

@section('content')
    <h4 class="section-header_title">RESET PASSWORD</h4>
    <hr>
    <form id="reset-form" action="/reset-password" method="post">@csrf
        <div class="form-group d-none">
            <input type="text" class="form-control" name="token" id="token" value="{{$token}}" aria-describedby="helpId" placeholder="">
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row mt-0">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="checkout-password">PASSWORD</label>
                            <input name="password" type="password" class="form-control" id="checkout-password" placeholder="Masukan Password">
                            <label for="checkout-password" generated="true" class="error invalid-feedback"></label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">KONFIRMASI PASSWORD</label>
                            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password">
                            <label for="password_confirmation" generated="true" class="error invalid-feedback"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <br><br>
                <button type="submit" class="btn btn-dark col-12 bayar">RESET PASSWORD</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#reset-form').validate({
            highlight: function(element, errorClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass('is-invalid');
            },
            rules: {
                password: 'required',
                password_confirmation: {
                    required: true,
                    equalTo: '#checkout-password'
                }
            }
        })
    })
</script>
@endsection