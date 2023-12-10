@extends('main')

@section('content')
<div class="pemustaka">
    <div class="container">
        <p>Data siswa pemustaka SMKN 1 Kepanjen</p>
        <button class="button btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">Tambahkan Baru</button>
        <div class="wrapper">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nisn }}</td>
                            <td>{{ $user->user->name }}</td>
                            <td>{{ $user->kelas }} {{ $user->jurusan }}</td>
                            <td>{{ $user->user->gender }}</td>
                            <td>{{ $user->user->status }}</td>
                            <td class="aksi">
                                <form method="POST" action="{{ route('students.destroy', ['student' => $user->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="hapus" type="submit" onclick="return confirm('Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    <div class="modal" id="addItem" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Siswa Pemustaka Baru</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="nisn">NISN</label>
                            <input type="text" name="nisn" placeholder="Nomor Induk Siswa Nasional" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" placeholder="Nama Lengkap Siswa" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-check-label">Jenis Kelamin</label>
                            <input type="radio" name="gender" placeholder="Jenis Kelamin" class="form-check-input" value="Perempuan" required> Perempuan
                            <input type="radio" name="gender" placeholder="Jenis Kelamin" class="form-check-input" value="Laki-laki" required> Laki-laki
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                            <select class="form-select" id="inputGroupSelect01" name="kelas" required>
                                <option selected>Pilih...</option>
                                <option value="X" >X</option>
                                <option value="XI" >XI</option>
                                <option value="XII" >XII</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" placeholder="Contoh: RPL 1" required>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="status">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option selected>Pilih...</option>
                                <option value="Pemustaka">Pemustaka</option>
                                <option value="Pustakawan">Pustakawan</option>
                            </select>
                        </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection