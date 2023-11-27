@extends('main')

@section('content')
<div class="pemustaka">
    <div class="container">
        <p>Data guru pemustaka SMKN 1 Kepanjen</p>
        <div class="wrapper">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">Tambahkan Baru</button>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->nip }}</td>
                            <td>{{ $teacher->user->name }}</td>
                            <td>{{ $teacher->user->gender }}</td>
                            <td>{{ $teacher->user->status }}</td>
                            <td class="aksi">
                                <a class="edit" href="{{ route('teachers.edit', ['teacher' => $user->id]) }}">Edit</a>
                                <form method="POST" action="{{ route('teachers.destroy', ['teacher' => $user->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="hapus" type="submit" onclick="return confirm('Anda yakin ingin menghapus guru ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                    <div class="mb-3">
                        <label for="kodeeksemplar">Kode Eksemplar Buku</label>
                        <input type="text" name="kodeeksemplar" placeholder="Kode eksemplar">
                    </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection