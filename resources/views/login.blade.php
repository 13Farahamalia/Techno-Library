<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Login</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Selamat Datang 
                    di Perpustakaan Kanesa</h1>
                <div class="input">
                <input id="name" type="text" class=" form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap" autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="input">
                <input id="password" type="password" class=" form-control @error('password') is-invalid @enderror" name="password" placeholder="password" autocomplete="password" autofocus>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <button type="submit">MASUK</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <img class="img" src="{{ asset('image/icon.png') }}" alt="Techno library">
                    <h1><b>Techno Library</b></h1>
            </div>
        </div>
    </div>
</body>
</html>