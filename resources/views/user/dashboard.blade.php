@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron bg-light p-5 rounded">
        <h2>Halo, {{ Auth::user()->namaLengkap }}!</h2>
        <p class="lead">Selamat datang di Galeri Produk kami. Silakan jelajahi katalog dan berikan ulasan Anda.</p>
        <hr>
        <a href="{{ route('produk.index') }}" class="btn btn-lg btn-primary">Lihat Koleksi Foto</a>
    </div>
</div>
@endsection