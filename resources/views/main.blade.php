<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sirkulasi.css') }}">
    <title>Techno Library</title>
</head>
<body>
  <header class="header">
    <nav class="navbar">
          <div class="user">
                <a href="profil.php">
                  <iconify-icon icon="ph:user-circle-fill" width="60px" style=""></iconify-icon>
                </a>
            </div>
           <div class="items">
                @if (Auth::user()->status == 'Pustakawan')
                    <a href="#" class="nav-item"><iconify-icon icon="heroicons-solid:library" width="40px"></iconify-icon>
                    Sirkulasi  <div class="space">|  aaaaa    |</div>
                    </a>
                    <a href="#" class="nav-item"><iconify-icon icon="fluent:library-24-filled" width="40px"></iconify-icon>
                    Pemustaka  <div class="space">|  aaaaa    |</div>    
                    </a>
                    <a href="#" class="nav-item"><iconify-icon icon="iconamoon:history-bold" width="40px"></iconify-icon>
                    Koleksi   <div class="space">|  aaaaa    |</div>
                    </a>
                @else
                    <a href="{{ route('beranda') }}" class="nav-item"><iconify-icon icon="heroicons-solid:library" width="60px"></iconify-icon>
                    Beranda  <div class="space">|  aaaaa    |</div>
                    </a>
                    <a href="daftarbuku.php" class="nav-item"><iconify-icon icon="fluent:library-24-filled" width="40px"></iconify-icon>
                    Daftar Buku  <div class="space">|  aaaaa    |</div>    
                    </a>
                    <a href="aktifitas.php" class="nav-item"><iconify-icon icon="iconamoon:history-bold" width="40px"></iconify-icon>
                    Aktifitas   <div class="space">|  aaaaa    |</div>
                    </a>
                @endif                
            </div>
            <div class="logout">
                <a href="{{ route('logout') }}">Keluar</a>
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
