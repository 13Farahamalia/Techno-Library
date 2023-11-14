<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class ListBooksController extends Controller
{
    public function index()
    {
        $books = Books::latest()->get();
        return view('daftarbuku', compact('books'));
    }

    
    public function create()
    {
        return view('book-add');
    }

    public function store(Request $request)
    {
        $data = Books::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('image/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return to_route('books')->with('success','Berhasil Ditambahkan');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
