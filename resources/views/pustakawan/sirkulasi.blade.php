@extends('main')

@section('content')
<div class="sirkulasi">
  <div class="colom">
      <div class="opsi">
        <div class="text">
          <h2>Peminjaman</h2>
          <p>Semua data peminjaman tersimpan pada menu ini</p>
        </div>
        <a class="btn" href="{{ route('peminjaman.index') }}">
          Masuk
        </a>
      </div>
      <div class="opsi">
      <div class="text">
          <h2>Pengembalian</h2>
          <p>Semua data pengembalian tersimpan pada menu ini</p>
        </div>
        <a class="btn" href="{{ route('pengembalian.index') }}">
          Masuk
        </a>
      </div>
      <div class="opsi">
      <div class="text">
          <h2>Pembayaran Denda</h2>
          <p>Semua data yang harus dan sudah membayar denda tersimpan pada menu ini</p>
        </div>
        <a class="btn" href="">
          Masuk
        </a>
      </div>
      </div>
      <img class="img" src="{{ asset('image/booklamp.png') }}" width="450px" height="400px">
</div>
@endsection