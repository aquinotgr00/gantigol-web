@extends('_layouts.wrapper')

@section('heading')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">HOME</a></li>
            <li class="breadcrumb-item active" aria-current="page">THANK YOU</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<div>
    <h2 class="text-center">TERIMAKASIH {{ session('messages.heading') ?? "TELAH MELAKUKAN PEMESANAN!" }}</h2>
    <br>
    <i class="fas fa-check fa-7x text-center w-100"></i>
    <br><br>
    <p class="text-center">{{ session('messages.body') ?? "Kami mengirim konfirmasi pesanan dan detail pesanan ke email anda" }}</p>
    <br><br><br>
    <div class="text-center">
        <a class="btn btn-dark col-3 bayar align-middle" href="/">HOME</a>
    </div>
</div>
@endsection