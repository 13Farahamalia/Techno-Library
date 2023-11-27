<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teacher::lates()->get();
        return view('putakawan.teachers', compact('teachers'));
    }
    
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'status' => $request->status,
            'password' => Hash::make('$request->nip')
        ]);
        $user->teachers()->create([
            'nip' => $request->nip
        ]);
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'Data guru tidak ditemukan.');
        }

        return view('pustakawan.edit-teacher', compact('teacher'));
    }

    public function update(Request $request, string $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'Data guru tidak ditemukan.');
        }

        $teacher->user->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'status' => $request->status,
        ]);

        $teacher->update([
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('students.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return redirect()->route('teachers.index')->with('error', 'Data guru tidak ditemukan.');
        }
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
