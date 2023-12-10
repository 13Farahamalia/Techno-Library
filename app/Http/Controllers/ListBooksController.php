<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\search;

class ListBooksController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $books = Books::where('judul', 'LIKE', '%' . $search . '%')
                        ->orWhere('kategori', 'LIKE', '%' . $search . '%')
                        ->orWhere('pencipta', 'LIKE', '%' . $search . '%')
                        ->orWhere('penerbit', 'LIKE', '%' . $search . '%')->get();
        }
        $books = Books::latest()->get();
        return view('pustakawan.daftarbuku', compact('books','search'));
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
        return view('pustakawan.edit-book', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $book = Books::find($id);
        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimes:png,jpg,jpeg'
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $data = request()->except(['_token', '_method']);
        $data['foto'] = $request->file('foto')->store('buku', 'public');
        Books::where('id', '=', $id)->update($data);
        // $data['foto'] = $request->hasFile('foto')
        // ? $request->file('foto')->store('buku', 'public')
        // : $request->input('foto');
        return to_route('books.index');
    }

    public function destroy(string $id)
    {
        $book = Books::find($id);
        if(!$book) {
            return to_route('books.index')->with('error', 'Data tidak ditemukan!');
        }
        $book->delete();
        return to_route('books.index')->with('success', 'berhasil menghapus data');
    }
}
