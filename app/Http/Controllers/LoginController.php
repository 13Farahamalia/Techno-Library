<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginPost(Request $request) {
        $data = [
            'name' => $request->name,
            'password' => $request->password
        ];
        $user = User::where('name', $data['name'])->count();

        if($user == 0){
            return back()->withErrors([
                'name' => 'Akun Anda belum terdaftar',
            ]);
        }
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            if (Auth::user()->status == 'Pustakawan'){
                return to_route('sirkulasi')->with('success', 'Berhasil Masuk');
            } else {
            return to_route('beranda')->with('success', 'Berhasil Masuk');
            }
        }
 
        return back()->withErrors([
            'password' => 'Password salah',
        ])->onlyInput('name');
    }

    public function logout(){
        Auth::logout();
        return redirect('');
    }
}
