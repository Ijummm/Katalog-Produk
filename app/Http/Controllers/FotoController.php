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

    $data = $request->except('lokasiFile');

    if ($request->hasFile('lokasiFile')) {
        $file = $request->file('lokasiFile');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        
        $file->storeAs('photos', $namaFile, 'public'); 
        
        $data['lokasiFile'] = $namaFile;
    }

    $data['tanggalUnggah'] = now(); 
    $data['userID'] = auth::id();

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