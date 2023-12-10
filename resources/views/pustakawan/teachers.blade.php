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
                            <th>No</th>
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $teacher->nip }}</td>
                            <td>{{ $teacher->user->name }}</td>
                            <td>{{ $teacher->user->gender }}</td>
                            <td>{{ $teacher->user->status }}</td>
                            <td class="aksi">
                                <form method="POST" action="{{ route('teachers.destroy', ['teacher' => $teacher->id]) }}">
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
            <h5 class="modal-title">Tambah Guru Pemustaka Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('teachers.store') }}" enctype="multipart/form-data">
                  @csrf
                      <div class="mb-3">
                          <label for="nip">NIP</label>
                          <input type="text" name="nip" placeholder="NIP Guru" class="form-control" required>
                      </div>
                      <div class="mb-3">
                          <label for="name">Nama Lengkap</label>
                          <input type="text" name="name" placeholder="Nama Lengkap Guru" class="form-control" required>
                      </div>
                      <div class="mb-3">
                          <label for="gender" class="form-check-label">Jenis Kelamin</label>
                          <input type="radio" name="gender" placeholder="Jenis Kelamin" class="form-check-input" value="Perempuan" required> Perempuan
                          <input type="radio" name="gender" placeholder="Jenis Kelamin" class="form-check-input" value="Laki-laki" required> Laki-laki
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
@endsection