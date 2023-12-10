@extends('main-pemustaka')

@section('content')
<div class="daftarbuku">
    <div class="container">
        <p>Ayo! segera cek apakah ada buku yang sedang kamu cari?</p>
        <form action="" class="d-flex gap-3">
            <input type="text" class="form-control" name="search" placeholder="Cari buku...">
            <button class="btn btn-primary">Cari</button>
        </form>
        <div class="wrapper">
            @foreach ($books as $book)
                <div class="item">
                    <div class="foto">
                        <img src="{{ url('storage/'.$book->foto) }}">
                    </div>
                    <div class="text">
                        <h4>{{ $book->judul }}</h4>
                        <p>Pencipta: {{ $book->pencipta }}</p>
                        <p>Kategori: {{ $book->kategori }}</p>
                        <p>Stok: {{ $book->stok }}</p>
                        <p>Diupload pada: {{ $book->created_at }}</p>
                        <p>Penerbit: {{ $book->penerbit }}</p>
                        <p>Tanggal terbit: {{ $book->tanggalterbit }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection