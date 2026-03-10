@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-success text-white p-3">
                    <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Tambah Produk Baru</h4>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-warning border-0">
                        <small><strong>Informasi:</strong> Halaman ini hanya dapat diakses oleh Admin untuk mengelola katalog produk.</small>
                    </div>

                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Produk</label>
                            <input type="text" name="judulFoto" class="form-control" placeholder="Contoh: Green Apple" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi Produk</label>
                            <textarea name="deskripsiFoto" class="form-control" rows="4" placeholder="Jelaskan detail produk Anda..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Unggah Gambar Produk</label>
                            <input type="file" name="lokasiFile" class="form-control" accept="image/*" required>
                            <div class="form-text text-muted">Format yang didukung: <strong>JPG, JPEG, PNG</strong> (Maksimal 2MB).</div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success px-5 shadow-sm">
                                <i class="fas fa-save me-1"></i> Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection