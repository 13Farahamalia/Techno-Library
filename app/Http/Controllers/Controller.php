<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Borrow;
use App\Models\Books;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function pinjamBuku($bookId)
    {
        $book = Books::findOrFail($bookId);

        // Cek apakah masih ada stok
        if ($book->stok > 0) {
            // Kurangi stok buku
            $book->stok--;
            $book->save();

            // Simpan data peminjaman
            Borrow::create([
                'book_id' => $book->id,
                'user_id' => auth()->user()->id,
                'tanggal_peminjaman' => Carbon::now(),
                'tanggal_pengembalian' => Carbon::now()->addDays(7), // Contoh, sesuaikan dengan aturan Anda
            ]);
            return redirect()->back()->with('success', 'Buku berhasil dipinjam.');
        } else {
            return redirect()->back()->with('error', 'Stok buku habis.');
        }
    }

}
