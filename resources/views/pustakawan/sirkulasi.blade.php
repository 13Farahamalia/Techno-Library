@extends('main')

@section('content')
<title>
  <h1>Daftar Fitur</h1>
</title>
<div class="pilih">
  <div class="colom">
      <div class="opsi">
        <div class="text">
          <h2>Peminjaman</h2>
        </div>
        <a class="btn" href="peminjaman.php">
          Masuk
        </a>
      </div>
      <div class="opsi">
      <div class="text">
          <h2>Pengembalian</h2>
        </div>
        <a class="btn" href="pengembalian.php">
          Masuk
        </a>
      </div>
      <div class="opsi">
      <div class="text">
          <h2>Pembayaran Denda</h2>
        </div>
        <a class="btn" href="bayardenda.php">
          Masuk
        </a>
      </div>
      </div>
      <img class="img" src="{{ asset('image/booklamp.png') }}" alt="">
</div>
@endsection