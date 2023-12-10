<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Peminjaman Baru</title>
</head>
<body class="d-flex justify-content-center">
    <div class="card w-50 mt-5">
        <div class="card-header">
          Pinjam Buku
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01" name="book_id" required>Judul Buku</label>
                        <select class="form-select" id="inputGroupSelect01" name="book_id" required>
                            @foreach($books as $book)
                            <option value="{{ $book->id }}">{{ $book->judul }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01" name="user_id" required>Nama Peminjam</label>
                        <select class="form-select" id="inputGroupSelect01" name="user_id" required>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah">Jumlah Pinjam</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="jumlah pinjam" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
                        <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ now()->toDateString() }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pengembalian">Tanggal Penembalian:</label>
                        <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ now()->addDays(7)->toDateString() }}" required>
                    </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>