@extends('main')

@section('content')
<div class="pemustaka">
    <div class="container">
        <p>Data pengembalian SMKN 1 Kepanjen</p>
        <div class="wrapper">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Judul Buku</th>
                            <th>Jumlah Pinjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Dikembalikan Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($histories as $key => $data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->book->judul }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->tanggal_peminjaman }}</td>
                            <td>{{ $data->returned_at }}</td>
                            <td class="aksi">
                                <form method="POST" action="{{ route('pengembalian.destroy', ['pengembalian' => $data->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="hapus" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
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