<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('pustakawan.students', compact('students'));
    }

    public function create()
    {
        return view('pustakawan.add-student');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'status' => $request->status,
            'password' => Hash::make($request->nisn)
        ]);
        $user->students()->create([
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('students.index')->with('success', 'Data siswa telah berhasil disimpan.');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('pustakawan.edit-student', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Data siswa tidak ditemukan.');
        }

        $student->user->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'status' => $request->status,
        ]);

        $student->update([
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Data siswa tidak ditemukan.');
        }
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
