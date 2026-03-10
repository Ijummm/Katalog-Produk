@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-info">
        <h4>Panel Kontrol Admin</h4>
        <p>Selamat datang, <strong>{{ Auth::user()->namaLengkap }}</strong>. Anda memiliki akses penuh untuk mengelola katalog.</p>
    </div>

    <div class="row text-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h5>Tambah Produk Baru</h5>
                <p>Unggah foto produk dan deskripsi ke galeri.</p>
                <a href="{{ route('produk.create') }}" class="btn btn-success">Mulai Unggah</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h5>Lihat Katalog</h5>
                <p>Pantau semua produk dan komentar yang masuk.</p>
                <a href="{{ route('produk.index') }}" class="btn btn-primary">Buka katalog</a>
            </div>
        </div>
    </div>
</div>
@endsection