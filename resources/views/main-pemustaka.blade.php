<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('image/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sirkulasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daftarbuku.css') }}">
    <title>Techno Library</title>
</head>
<body>
  <header class="header">
    <nav class="navbar">
          <div class="user la">
                <a href="">
                  <iconify-icon icon="ph:user-circle-fill" width="60px" style=""></iconify-icon>
                </a>
            </div>
           <div class="items la">
                    <a href="{{ route('beranda') }}" class="nav-item {{ request()->routeIs('beranda') ? 'aktif' : '' }}"><img src="{{ asset('image/icon-beranda.png') }}">
                    Beranda </a>
                    <a href="{{ route('daftar.buku') }}" class="nav-item {{ request()->routeIs('daftar.buku') ? 'aktif' : '' }}"><img src="{{ asset('image/icon-daftar-buku.png') }}">
                    Daftar Buku </a>
                    <a href="aktifitas.php" class="nav-item" {{ request()->routeIs('aktifitas') ? 'aktif' : '' }}><img src="{{ asset('image/icon-aktifitas.png') }}">
                    Aktifitas </a>           
            </div>
            <div class="access la">
                @if ( Auth::check() )
                <form action="{{ route('logout') }}" method="POST" role="search">
                    @csrf
                    @method('DELETE')
                    <button class="access" type="submit">Keluar</button>
                </form>
                @else
                <a class="access" href="{{ route('login') }}">Masuk</a>
                @endif
            </div>
        </nav>
    </header>
    <div class="mt-2">
        <div class="content">
            @yield('content')
        </div>
    </div>
    <div class="footer">
    <footer>
        <p>&copy;Technolibrary Kanesa 2023</p>
        <a target="_blank" href="https://instagram.com/kanesa.library?utm_source=qr&igshid=MzNlNGNkZWQ4Mg=="><iconify-icon icon="skill-icons:instagram" width="40px"></iconify-icon>@kanesa.library</a>
    </footer>
    </div>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
</html>
