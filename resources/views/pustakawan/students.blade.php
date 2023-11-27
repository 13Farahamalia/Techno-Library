@extends('main')

@section('content')
<div class="pemustaka">
    <div class="container">
        <p>Data siswa pemustaka SMKN 1 Kepanjen</p>
        <div class="wrapper">
            <a href="{{ route('students.create') }}" class="button">Tambah Baru</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
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
                            <td>{{ $user->nisn }}</td>
                            <td>{{ $user->user->name }}</td>
                            <td>{{ $user->kelas }} {{ $user->jurusan }}</td>
                            <td>{{ $user->user->gender }}</td>
                            <td>{{ $user->user->status }}</td>
                            <td class="aksi">
                                <a class="edit" href="{{ route('students.edit', ['student' => $user->id]) }}">Edit</a>
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
</div>
@endsection