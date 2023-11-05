<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <form method="POST" action="{{ route('students.update', ['student' => $student->id]) }}">
        @csrf
        @method('PUT')
        
        <div class="div">
        <label for="nisn">NISN:</label>
        <input type="text" name="nisn" id="nisn" value="{{ $student->nisn }}" required>
        </div>

        <div class="div">
        <label for="name">Nama Lengkap:</label>
        <input type="text" name="name" id="name" value="{{ $student->user->name }}" required>
        </div>
        
        <div class="div">
            <label for="gender">Jenis Kelamin:</label>
            <input type="radio" name="gender" value="Perempuan" {{ $student->user->gender == 'Perempuan' ? 'checked' : '' }}> Perempuan
            <input type="radio" name="gender" value="Laki-laki" {{ $student->user->gender == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
        </div>

        <div class="div">
        <label for="kelas">Kelas:</label>
        <select name="kelas" id="kelas" required>
            <option value="X" {{ $student->kelas == 'X' ? 'selected' : '' }}>X</option>
            <option value="XI" {{ $student->kelas == 'XI' ? 'selected' : '' }}>XI</option>
            <option value="XII" {{ $student->kelas == 'XII' ? 'selected' : '' }}>XII</option>
        </select>
        </div>
        
        <div class="div">
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" value="{{ $student->jurusan }}" required>
        </div>

        <div class="div">
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Pemustaka" {{ $student->user->status == 'Pemustaka' ? 'selected' : '' }}>Pemustaka</option>
            <option value="Pustakawan" {{ $student->user->status == 'Pustakawan' ? 'selected' : '' }}>Pustakawan</option>
        </select>
        </div>
    
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>