<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginPost(Request $request) {

        // $data = [
        //     'name' => $request->name,
        //     'nisn' => $request->nomor,
        //     'password' => $request->nomor
        // ];

        if(Auth::guard('student')->attempt(['nisn' => $request->nomor, user()->'name' => $request->name, 'password' => $request->password])){
            $student = Student::where('nisn', $request->nomor)->count();
            if($student== 0){
                return back()->withErrors([
                    'nisn' => 'Akun Anda belum terdaftar',
                ]);
            }
            return redirect('/pemustaka')->with('success', 'Berhasil Masuk');
        } elseif (Auth::guard('teacher')->attempt(['nip' => $request->nomor, 'name' => $request->name, 'password' => $request->password])){
            return redirect('/pemustaka')->with('success', 'Berhasil Masuk');
        }
        return back();

        // dd($data);
        // $user = Student::where('nisn', $data['nisn'])->count();

        // if($user == 0){
        //     return back()->withErrors([
        //         'nisn' => 'Akun Anda belum terdaftar',
        //     ]);
        // }
        // if (Auth::attempt($data)) {
        //     $request->session()->regenerate();
        //     if (Auth::user()->status == 'Pustakawan'){
        //         return redirect('/pustakawan')->with('success', 'Berhasil Masuk');
        //     } else {
        //     return redirect('/pemustaka')->with('success', 'Berhasil Masuk');
        //     }
        // }
 
        // return back()->withErrors([
        //     'name' => 'Nama atau NISN/NIP tidak sesuai',
        // ])->onlyInput('name');
    }

    public function logout(){
        Auth::logout();
        return redirect('');
    }
}
