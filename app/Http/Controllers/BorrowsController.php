<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Borrow;
use App\Models\Books;
use App\Models\History;
use App\Models\Repayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowsController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $users = User::all();
        $books = Books::all();
        $borrows = Borrow::get()->all();
        return view('pustakawan.peminjaman', compact('borrows', 'users', 'books'));
    }
    
    public function create(){
        $users = User::all();
        $books = Books::all();
        return view('pustakawan.peminjaman-create', ['books' => $books], ['users' => $users]);
    }

    public function store(Request $request){
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $book_id = $request->input('book_id');
        $jumlah = $request->input('jumlah');

        $book = Books::find($book_id);

        if ($jumlah > $book->stok) {
            return back()->with('warning', "Maaf, stok buku {$book->judul} tidak mencukupi. Maksimal {$book->stok}");
        }

        Borrow::create([
            'book_id' => $request->book_id,
            'user_id' => $request->user_id,
            'jumlah' => $request->jumlah,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);
        $user = User::find($request->user_id);
        $book = Books::find($request->book_id);
        if ($book->stok >= $request->jumlah) {
            $book->stok -= $request->jumlah;
            $book->save();
        }
        return to_route('peminjaman.index')->with('success', "{$user->name} Berhasil meminjam buku {$book->judul}");
    }

    public function edit(string $id){
        $data = Borrow::find($id);
        if (!$data) {
            return back()->with('error', 'Data tidak ditemukan');
        }
        return view('pustakawan.peminjaman', compact('book'));
    }

    public function update(Request $request, string $id){
        $data = $request->all();
        Borrow::where('id', '=', $id)->update($data);
        return to_route('peminjaman.index');
    }

    public function destroy(Request $request, string $id){
        $transaction = Borrow::find($id);

        if ($transaction) {
            $user = User::find($transaction->user_id);
            $book = Books::find($transaction->book_id);
            $book->stok += $transaction->jumlah;
            $book->save();

            $transaction->update(['status' => 'Sudah Dikembalikan']);

            History::create([
                'book_id' => $transaction->book_id,
                'user_id' => $transaction->user_id,
                'jumlah' => $transaction->jumlah,
                'tanggal_peminjaman' => $transaction->tanggal_peminjaman,
                'returned_at' => now(),
            ]);
            
        }
        toastr()->success("{$user->name} Berhasil mengambalikan buku {$book->judul}", 'Sukses!');
        return to_route('peminjaman.index');
    }
}
