@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="rounded-4 overflow-hidden shadow-sm bg-light d-flex align-items-center justify-content-center" style="min-height: 400px;">
                    <img src="{{ asset('storage/photos/'.$foto->lokasiFile) }}" 
                        class="img-fluid w-100 rounded-4 shadow"
                        alt="{{ $foto->judulFoto }}" 
                        style="max-height: 700px; object-fit: cover;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="ps-md-3">
                    <div class="d-flex justify-content-between">
                        <h2 class="fw-bold text-primary">{{ $foto->judulFoto }}</h2>
                        <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <p class="text-muted small">Diunggah oleh Admin pada {{ $foto->tanggalUnggah }}</p>
                    <hr>
                    <h5 class="fw-bold">Deskripsi Produk</h5>
                    <p class="text-secondary" style="line-height: 1.8;">
                        {{ $foto->deskripsiFoto }}
                    </p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-light p-4 rounded-4 shadow-sm">
                    <h5 class="fw-bold mb-4"><i class="far fa-comments me-2"></i>Komentar Pengguna</h5>
                    
                    <div class="comment-list mb-4" style="max-height: 400px; overflow-y: auto;">
                        @forelse($foto->komentars as $k)
                            <div class="card border-0 mb-3 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary mb-1">{{ $k->user->username }}</h6>
                                    <p class="mb-0 text-muted small">{{ $k->isiKomentar }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted fst-italic">
                                Belum ada komentar untuk produk ini.
                            </div>
                        @endforelse
                    </div>

                    <form action="{{ route('komentar.store') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="fotoID" value="{{ $foto->fotoID }}">
                        <div class="input-group">
                            <input type="text" name="isiKomentar" class="form-control form-control-lg border-0 shadow-sm" placeholder="Tulis komentar kamu di sini..." required>
                            <button class="btn btn-primary px-4 shadow-sm" type="submit">
                                <i class="fas fa-paper-plane me-1"></i> Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection