<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function index(){
        return view('pustakawan.sirkulasi');
    }

    public function pemustaka(){
        return view('pustakawan.pemustaka');
    }
}
