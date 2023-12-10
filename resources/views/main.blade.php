<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('image/icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sirkulasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daftarbuku.css') }}">
    <link rel="stylesheet" href="{{ asset('css/students.css') }}">
    <title>Techno Library</title>
</head>
<body>

    <nav class="navbar">
        <div class="user la">
            <a href="">
              <iconify-icon icon="ph:user-circle-fill" width="60px" style=""></iconify-icon>
            </a>
        </div>
       <div class="items la">
                <a href="{{ route('pustakawan') }}" class="nav-item"><img src="{{ asset('image/icon-sirkulasi.png') }}">
                Sirkulasi </a>
                <a href="{{ route('books.index') }}" class="nav-item"><img src="{{ asset('image/icon-daftar-buku.png') }}">
                Daftar Buku </a>
                <a href="{{ route('pemustaka') }}" class="nav-item"><img src="{{ asset('image/icon-pemustaka.png') }}">
                Pemustaka </a>
                <a href="#" class="nav-item"><img src="{{ asset('image/icon-koleksi.png') }}">
                Koleksi </a>           
        </div>
        <div class="access la">
            @if ( Auth::check() )
            <form action="{{ route('logout') }}" method="POST" role="search">
                @csrf
                @method('DELETE')
                <button class="btn" type="submit">Keluar</button>
            </form>
            @else
            <a class="btn" href="{{ route('login') }}">Masuk</a>
            @endif
        </div>
        </nav>
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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
</html>
