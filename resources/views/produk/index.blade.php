@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Katalog Produk</h2>
        @if(Auth::user()->role == 'admin')
            <a href="{{ route('produk.create') }}" class="btn btn-success shadow-sm">
                <i class="fas fa-plus me-1"></i> Tambah Produk Baru
            </a>
        @endif
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($fotos as $f)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="position-relative">
                    <img src="{{ asset('storage/photos/'.$f->lokasiFile) }}" 
                         class="card-img-top" 
                         style="height: 250px; object-fit: cover;" 
                         alt="{{ $f->judulFoto }}">
                    
                    @if(Auth::user()->role == 'admin')
                    <div class="position-absolute top-0 end-0 m-2">
                        <form action="{{ route('produk.destroy', $f->fotoID) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle p-2 shadow" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>

                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $f->judulFoto }}</h5>
                    <p class="card-text text-muted small">{{ $f->deskripsiFoto }}</p>
                    
                    <hr class="my-3 opacity-25">

                    <h6 class="fw-bold small mb-2"><i class="far fa-comments me-1"></i> Komentar:</h6>
                    <div class="comment-box mb-3" style="max-height: 120px; overflow-y: auto;">
                        @forelse($f->komentars as $k)
                            <div class="bg-light p-2 rounded mb-2">
                                <p class="mb-0 small">
                                    <span class="fw-bold text-primary">{{ $k->user->username }}:</span> 
                                    {{ $k->isiKomentar }}
                                </p>
                            </div>
                        @empty
                            <p class="text-muted small fst-italic">Belum ada komentar.</p>
                        @endforelse
                    </div>

                    <form action="{{ route('komentar.store') }}" method="POST" class="mt-2">
                        @csrf
                        <input type="hidden" name="fotoID" value="{{ $f->fotoID }}">
                        <div class="input-group input-group-sm">
                            <input type="text" name="isiKomentar" class="form-control border-end-0" placeholder="Tulis komentar..." required>
                            <button class="btn btn-primary border-start-0" type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection