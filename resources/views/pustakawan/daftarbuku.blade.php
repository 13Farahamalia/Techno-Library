@extends('main')

@section('content')
<div class="daftarbuku">
    <div class="container">
        <p>Ayo! segera cek apakah ada buku yang sedang kamu cari?</p>
        <div class="wrapper">
            @foreach ($books as $book)
                <div class="item">
                    <div class="foto">
                        <img src="{{ asset('image/'.$book->foto) }}">
                    </div>
                    <div class="text">
                        <h4>{{ $book->judul }}</h4>
                        <p>Pencipta: {{ $book->pencipta }}</p>
                        <p>Kategori: {{ $book->kategori }}</p>
                        <p>Diupload pada: {{ $book->created_at }}</p>
                        <p>Penerbit: {{ $book->penerbit }}</p>
                        <p>Tanggal terbit: {{ $book->tanggalterbit }}</p>
                        <div class="aksi">
                            <a class="button edit" href="{{ route('books.edit', ['book' => $book->id]) }}">Edit</a>
                            <form method="POST" action="{{ route('books.destroy', ['book' => $book->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="button delete" type="submit" onclick="return confirm('Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection