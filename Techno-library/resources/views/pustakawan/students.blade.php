<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relasi One to One</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="text-center my-4">Laravel Eloquent Relationship : One To One</h5>
                <br>
                <a href="{{ route('students.create') }}">Tambah Baru</a>
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
                            <td>
                                <a href="{{ route('students.edit', ['student' => $user->id]) }}">Edit</a>
                                <form method="POST" action="{{ route('students.destroy', ['student' => $user->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return confirm('Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>