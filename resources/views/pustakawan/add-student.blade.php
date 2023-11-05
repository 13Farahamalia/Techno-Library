<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf

        <div class="div">
        <label for="nisn">NISN:</label>
        <input type="text" name="nisn" id="nisn" required>
        </div>

        <div class="div">
        <label for="name">Nama Lengkap:</label>
        <input type="text" name="name" id="name" required>
        </div>
        
        <div class="div">
        <label for="gender">Jenis Kelamin:</label>
        <input type="radio" name="gender" value="Perempuan"> Perempuan
        <input type="radio" name="gender" value="Laki-laki"> Laki-laki
        </div>

        <div class="div">
        <label for="kelas">Kelas:</label>
        <select name="kelas" id="kelas" required>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select>
        </div>
        
        <div class="div">
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" required>
        </div>

        <div class="div">
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Pemustaka">Pemustaka</option>
            <option value="Pustakawan">Pustakawan</option>
        </select>
        </div>
    
        <button type="submit">Submit</button>
    </form>    
  </body>
</html>