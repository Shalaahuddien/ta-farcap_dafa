<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //buat function creat buat regis
     public function create()
    {
        //jika mau regis maka akan jalankan di view register
        return view('auth.register');
    }


    public function store(Request $request)
    {
        //untuk testing datanya sdh masuk db atau blm
        // dd($request);

        //permintaan yg di terima akan di validate dgn methode validate , methode validate akan memeriksa apakah email yang diterima merupakan string yang valid dan memiliki format yang sesuai dengan format email dan pass apakah sesuai dgn syarat yg di tentukan atau tidak
        $this->validate($request, [
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8']
        ]);

        //buat objek si user dan gunakn method create
        //ketika object user di buat ia akan di simpan ke db menggunakan elequent yg ada di laravel
       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // dd($user);

        //jika sdh regis maka kembali ke hal login
        return redirect('/login');
    }

}
