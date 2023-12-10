@extends('main')

@section('content')
<div class="daftarbuku">
    <div class="container">
        <p>Semua buku yang ada disini, adalah buku yang bisa dipinjam oleh pemustaka</p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">Tambahkan Baru</button>
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
                        <div class="aksi">
                            {{-- <a class="button edit" href="{{ route('books.edit', ['book' => $book->id]) }}" data-bs-toggle="modal" data-bs-target="#editItem" >Edit</a> --}}
                            <form method="POST" action="{{ route('books.destroy', ['book' => $book->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="button delete" type="submit" onclick="return confirm('Anda yakin ingin menghapus buku ini?')">Hapus</button>
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
                        <select class="form-select" id="inputGroupSelect01" required>
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
                        <input type="file" accept="image/*" name="foto" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul">Judul Buku</label>
                        <input type="text" name="judul" placeholder="Judul Buku" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" placeholder="Stok Buku" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="pencipta">Nama Pencipta</label>
                        <input type="text" name="pencipta" placeholder="Nama Pencipta" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit">Nama Penerbit</label>
                        <input type="text" name="penerbit" placeholder="Nama Penerbit" class="form-control" required>
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

  {{-- <div class="modal" id="editItem" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('books.update', ['book' => $book->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Kategori Buku</label>
                        <select class="form-select" id="inputGroupSelect01">
                            <option value="Jurusan TKJ" {{ $book->kategori == 'Jurusan TKJ' ? 'selected' : '' }}>Jurusan TKJ</option>
                            <option value="Jurusan RPL" {{ $book->kategori == 'Jurusan RPL' ? 'selected' : '' }}>Jurusan RPL</option>
                            <option value="Jurusan TEI" {{ $book->kategori == 'Jurusan TEI' ? 'selected' : '' }}>Jurusan TEI</option>
                            <option value="Jurusan TBSM" {{ $book->kategori == 'Jurusan TBSM' ? 'selected' : '' }}>Jurusan TBSM</option>
                            <option value="Jurusan TKRO" {{ $book->kategori == 'Jurusan TKRO' ? 'selected' : '' }}>Jurusan TKRO</option>
                            <option value="Novel" {{ $book->kategori == 'Novel' ? 'selected' : '' }}>Novel</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="foto">Upload Foto Buku</label>
                        <input type="file" accept="image/*" name="foto" class="form-control" value="{{ $book->foto }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul">Judul Buku</label>
                        <input type="text" name="judul" placeholder="Judul Buku" class="form-control" value="{{ $book->judul }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pencipta">Nama Pencipta</label>
                        <input type="text" name="pencipta" placeholder="Nama Pencipta" class="form-control" value="{{ $book->pencipta }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit">Nama Penerbit</label>
                        <input type="text" name="penerbit" placeholder="Nama Penerbit" class="form-control" value="{{ $book->penerbit }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalterbit">Tanggal Terbit</label>
                        <input type="date" name="tanggalterbit" value="{{ $book->tanggalterbit }}">
                    </div>
                    <div class="mb-3">
                        <label for="kodeeksemplar">Kode Eksemplar Buku</label>
                        <input type="text" name="kodeeksemplar" placeholder="Kode eksemplar" class="form-control" value="{{ $book->kodeeksemplar }}" required>
                    </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
      </div>
    </div> --}}
  </div>
@endsection