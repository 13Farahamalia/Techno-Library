<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        return view('pemustaka.beranda');
    }
    public function displaybook() {
        $books = Books::latest()->get();
        return view('pemustaka.daftarbuku', compact('books'));
    }
}
