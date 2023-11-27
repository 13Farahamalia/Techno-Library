<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku yang bisa dipinjam</title>
</head>
<body>
    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="div">
            <label for="kategori">Kategori</label>
            <select name="kategori" required>
                <option selected>-- Pilih --</option>
                <option value="Jurusan TKJ">Jurusan TKJ</option>
                <option value="Jurusan RPL">Jurusan RPL</option>
                <option value="Jurusan TEI">Jurusan TEI</option>
                <option value="Jurusan TBSM">Jurusan TBSM</option>
                <option value="Jurusan TKRO">Jurusan TKRO</option>
                <option value="Novel">Novel</option>
            </select>
        </div>

        <div class="div">
            <label for="foto">Upload Foto Buku</label>
            <input type="file" name="foto">
        </div>

        <div class="div">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" placeholder="Judul Buku">
        </div>

        <div class="div">
            <label for="pencipta">Nama Pencipta</label>
            <input type="text" name="pencipta" placeholder="Nama Pencipta">
        </div>

        <div class="div">
            <label for="penerbit">Nama Penerbit</label>
            <input type="text" name="penerbit" placeholder="Nama Penerbit">
        </div>

        <div class="div">
            <label for="tanggalterbit">Tanggal Terbit</label>
            <input type="date" name="tanggalterbit">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>