<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman Login
    public function index() {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/produk');
        }

        return back()->with('error', 'Email atau Password salah!');
    }

    // Menampilkan halaman Register (Hanya untuk User)
    public function register() {
        return view('auth.register');
    }

    // Proses Simpan Register
    public function storeRegister(Request $request) {
        $data = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'namaLengkap' => 'required',
            'alamat' => 'required'
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user'; 

        User::create($data);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    // Logout
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
