@extends('main')

@section('content')
<div class="daftarbuku">
    <div class="container">
        <p>Semua buku yang ada disini, adalah buku yang bisa dipinjam oleh pemustaka</p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">Tambahkan Baru</button>
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
<div class="modal" id="addItem" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Buku yang bisa dipinjam</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Kategori Buku</label>
                        <select class="form-select" id="inputGroupSelect01">
                            <option selected>Pilih...</option>
                            <option value="Jurusan TKJ">Jurusan TKJ</option>
                            <option value="Jurusan RPL">Jurusan RPL</option>
                            <option value="Jurusan TEI">Jurusan TEI</option>
                            <option value="Jurusan TBSM">Jurusan TBSM</option>
                            <option value="Jurusan TKRO">Jurusan TKRO</option>
                            <option value="Novel">Novel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto">Upload Foto Buku</label>
                        <input type="file" accept="image/*" name="foto" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="judul">Judul Buku</label>
                        <input type="text" name="judul" placeholder="Judul Buku" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pencipta">Nama Pencipta</label>
                        <input type="text" name="pencipta" placeholder="Nama Pencipta" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit">Nama Penerbit</label>
                        <input type="text" name="penerbit" placeholder="Nama Penerbit" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalterbit">Tanggal Terbit</label>
                        <input type="date" name="tanggalterbit">
                    </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection