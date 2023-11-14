<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <title>Techno-Library</title>
</head>
<body>
  <header class="header">
    <nav class="navbar">
        <div class="icon">
            <div class="icon-img">
                <img src="{{ asset('image/icon.png') }}">
            </div>
            <div class="icon-teks">
                <p>KANESA</p><p>TECHNO LIBRARY</p>
            </div>
        </div>
        <div class="items">
            @if (Auth::user()->status == 'Pustakawan')                
            <a href="{{ route('sirkulasi') }}" class="nav-item"><img src="{{ asset('image/icon-sirkulasi.png') }}"> Sirkulasi</a>
            <a href="#" class="nav-item"><img src="{{ asset('image/icon-pemustaka.png') }}"> Pemustaka</a>
            <a href="#" class="nav-item"><img src="{{ asset('image/icon-koleksi.png') }}"> Koleksi</a>
            <a href="#" class="nav-item"><img src="{{ asset('image/icon-daftarbuku.png') }}"> Daftar Buku</a>
            @else
            <a href="{{ route('beranda') }}" class="nav-item"><img src="./asset/home.png"> Beranda</a>
            <a href="#" class="nav-item"><img src="{{ asset('image/icon-aktifitas.png') }}"> Aktifitas</a>
            @endif
        </div>
        <div class="user">
            <a href="profil.php">
              <img src="{{ asset('image/icon-user.png') }}">
            </a>
        </div>
        </nav>
    </header>
</body>
</html>
