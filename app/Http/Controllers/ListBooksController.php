<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ListBooksController extends Controller
{
    public function index()
    {
        $books = Books::latest()->get();
        return view('pustakawan.daftarbuku', compact('books'));
    }

    
    public function create()
    {
        return view('pustakawan.book-add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimes:png,jpg,jpeg'
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('buku', 'public');
        Books::create($data);

        return to_route('books.index')->with('success','Berhasil Ditambahkan');
    }

    public function edit(string $id)
    {
        $book = Books::find($id);
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Data siswa tidak ditemukan.');
        }
        return view('pustakawan.edit-student', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimes:png,jpg,jpeg'
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        User::whereId($id)->update($request->all());
        return to_route('books.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
