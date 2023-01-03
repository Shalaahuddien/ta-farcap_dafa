<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //ingin membuat auth yaitu (login)
    //buat functionnya terlebih dahulu
    public function login()
    {
        //maka jalankan view auth.login untuk ke tampilan auth
        return view('auth.login');
    }

    //buat function authentifikasi yang menerima sebuah parameter request
      public function authenticate(Request $request)
    {
        //membuat validation apakh sdh di registrasi atau belum , Jika valid, maka email dan password tersebut akan disimpan dalam array $credentials. Jika tidak valid, maka pengguna akan dikembalikan ke halaman sebelumnya dengan menampilkan pesan error.
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        //function Auth::attempt akan di panggil dengan parametr $credentials yg berisi email & pass yg sdh validate before. 
        //
        if (Auth::attempt($credentials)) {
            //method regeneret akan di panggil pada objek yg di terima , 
            //mengubah id yg aktif menjadi id sesi yg baru
            //setelah login berhasil maka ke bagian redirects
            $request->session()->regenerate();
            //dan di alihkan ke hal redirectcs 
            //hal yg dituju dapat di tentukan dgn parameter intended
            return redirect()->intended('redirects');
        };

        //user akan dikembalikan kehalan login jika input email salah
        return back()->withErrors([
            //jika salah akan memunculkan email tersebut
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
