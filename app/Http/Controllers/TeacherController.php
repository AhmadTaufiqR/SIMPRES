<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Ramsey\Uuid\Guid\GuidBuilder;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        return view('templates.Rayhans.Guru', compact('teacher'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required',
        ]);
        $teacher = Teacher::Create([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
        ]);
        if ($teacher) {
            return redirect('/teacher')->with('Success', 'Yeeayy!! Data guru berhasil ditambahkan');
        } else {
            return redirect('/teacher')->withErrors('Data guru gagal ditambahkan');
        }
    }
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id)->update([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);
        if ($teacher) {
            return redirect()->back()->with('Success', 'Yeeayy!! Data guru berhasil diubah');
        } else {
            return redirect('/teacher')->withErrors('Data guru gagal diubah');
        }
    }




    public function hapus(int $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            dd('Record not found');
        }
        $teacher->delete();
        return redirect()->back()->with('Success', 'Yeeayy!! Data guru berhasil dihapus');
    }
}
