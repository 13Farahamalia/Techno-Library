@extends('main')

@section('content')
<div class="pemustaka">
    <div class="container">
        <p>Data peminjaman SMKN 1 Kepanjen</p>
        <a href="{{ route('peminjaman.create') }}" class="button">Pinjam Buku</a>
        <div class="wrapper">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Judul Buku</th>
                            <th>Jumlah Pinjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrows as $key => $data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->book->judul }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>{{ $data->tanggal_peminjaman }}</td>
                            <td>{{ $data->tanggal_pengembalian }}</td>
                            <td>{{ $data->status }}</td>
                            <td class="aksi">
                                @if ($data->status == 'Belum Dikembalikan')
                                <form method="POST" action="{{ route('peminjaman.destroy', ['peminjaman' => $data->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="hapus" type="submit">Kembalikan</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection