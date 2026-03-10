<?php

namespace App\Http\Controllers;

use App\Models\KomentarFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarFotoController extends Controller
{
    public function store(Request $request) {
        $request->validate(['isiKomentar' => 'required']);

        KomentarFoto::create([
            'fotoID' => $request->fotoID,
            'userID' => Auth::id(),
            'isiKomentar' => $request->isiKomentar,
            'tanggalKomentar' => now()
        ]);

        return back()->with('success', 'Komentar terkirim!');
    }
}