@extends('main')

@section('content')
<div class="container">
    <div class="paragraph">
        <div class="left">
            <div class="title">
                <h1>Selamat Datang</h1>
                <h2>Di Perpustakaan Kanesa</h2>
            </div>
            <div class="text">
                <p> Perpustakaan sekolah merupakan salah satu sarana pelestarian bahan pustaka sebagai hasil budaya dan mempunyai <br>fungsi sebagai sumber informasi ilmu pengetahuan</p>
                <a href="" class="btn">Pinjam</a>
            </div>
        </div>
        <div class="foto">
            <img src="{{ asset('image/global.png') }}" alt="">
        </div>
    </div>    
    <div class="paragraph">
        <div class="foto">
        <img src="{{ asset('image/pile-book.png') }}" alt="">
        </div>
        <div class="right">
        <div class="title">
        <h1>Tujuan Dari</h1>
        <h2>Perpustakaan</h2>
        </div>
        <div class="text">
        <p>Untuk memupuk dan menumbuhkembangkan minat serta bakat siswa dan guru untuk membaca dan menulis, memperkenalkan teknologi informasi, dan membiasakan mengakses informasi secara mandiri</p>
            <a href="" class="btn">Aktifitas</a>
        </div>
        </div>
    </div>
</div>
@endsection