@extends('_layouts.wrapper')

@section('heading')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">HOME</a></li>
            <li class="breadcrumb-item active" aria-current="page">RESET</li>
        </ol>
    </nav>
</div>
<br>
@endsection

@section('content')
    <h4 class="section-header_title">RESET PASSWORD</h4>
    <hr>
    <form id="reset-form" action="/reset" method="post">@csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">EMAIL</label>
                    <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
                    <label for="email" generated="true" class="error invalid-feedback"></label>
                    @if (session()->has('error'))
                        <label class="error invalid-feedback d-block">
                            {{ session('error') ?? '' }}
                        </label>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <br><br>
                <button type="submit" class="btn btn-dark col-12 bayar">SEND RESET PASSWORD</button>
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
                email: {
                    required: true,
                    email: true
                }
            }
        })
    })
</script>
@endsection