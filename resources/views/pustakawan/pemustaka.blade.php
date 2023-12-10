@extends('main')

@section('content')
<div class="sirkulasi">
  <div class="colom">
      <div class="opsi">
        <div class="text">
          <h2>Data Siswa</h2>
          <p>Data siswa pemustaka SMKN 1 Kepanjen</p>
        </div>
        <a class="btn" href="{{ route('students.index') }}">
          Masuk
        </a>
      </div>
      <div class="opsi">
      <div class="text">
          <h2>Data Guru</h2>
          <p>Data guru pemustaka SMKN 1 Kepanjen</p>
        </div>
        <a class="btn" href="{{ route('teachers.index') }}">
          Masuk
        </a>
      </div>
      </div>
      <img class="img" src="{{ asset('image/booklamp.png') }}" width="450px">
</div>
@endsection