@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-warning text-dark p-3">
                    <h4 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i> Edit Produk</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('produk.update', $foto->fotoID) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Produk</label>
                            <input type="text" name="judulFoto" class="form-control" value="{{ $foto->judulFoto }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi Produk</label>
                            <textarea name="deskripsiFoto" class="form-control" rows="4" required>{{ $foto->deskripsiFoto }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold d-block">Gambar Saat Ini</label>
                            <img src="{{ asset('storage/photos/'.$foto->lokasiFile) }}" class="img-thumbnail mb-2" style="height: 150px;">
                            
                            <label class="form-label d-block fw-bold mt-2">Ganti Gambar (Kosongkan jika tidak ingin ganti)</label>
                            <input type="file" name="lokasiFile" class="form-control" accept="image/*">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                            <button type="submit" class="btn btn-warning px-5 fw-bold shadow-sm">Update Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection