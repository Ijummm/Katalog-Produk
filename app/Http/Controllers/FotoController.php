<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index() {
        $fotos = Foto::with('user')->get();
        return view('produk.index', compact('fotos'));
    }

    public function create() {
        if (Auth::user()->role !== 'admin') return abort(403);
        return view('produk.create');
    }

    public function store(Request $request) 
{
    $request->validate([
        'judulFoto'     => 'required|string|max:255',
        'deskripsiFoto' => 'required',
        'lokasiFile'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // 1. Ambil semua data kecuali lokasiFile agar tidak bentrok saat create
    $data = $request->except('lokasiFile');

    // 2. Proses Upload Gambar
    if ($request->hasFile('lokasiFile')) {
        $file = $request->file('lokasiFile');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        
        // GUNAKAN DISK 'public' secara eksplisit agar masuk ke storage/app/public/photos
        $file->storeAs('photos', $namaFile, 'public'); 
        
        // Simpan nama file ke array data
        $data['lokasiFile'] = $namaFile;
    }

    // 3. Tambahkan data otomatis
    $data['tanggalUnggah'] = now(); 
    $data['userID'] = auth::id();

    // 4. Simpan ke database
    Foto::create($data);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
}

    public function destroy($id) {
        $foto = Foto::findOrFail($id);
        if (Auth::user()->role !== 'admin') return abort(403);

        Storage::delete('public/photos/' . $foto->lokasiFile);
        $foto->delete();

        return redirect()->route('produk.index')->with('success', 'Produk dihapus!');
    }
}