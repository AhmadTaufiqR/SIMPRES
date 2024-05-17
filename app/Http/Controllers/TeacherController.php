<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Ramsey\Uuid\Guid\GuidBuilder;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::orderBy('id', 'desc')->paginate(10);
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

        $email = $request->input('email') . '@gmail.com';

        $teacher_email = Teacher::where('email', $email)->first();
        if ($teacher_email) {
            return redirect('/teacher')->withErrors('Email sudah terdaftar');
        }

        $teacher = Teacher::Create([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'email' => $email,
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
        return $request->input('gender');
        $email = $request->input('email') . '@gmail.com';
        $teacher = Teacher::findOrFail($id)->update([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'email' => $email,
            'password' => bcrypt($request->input('password')),
            'gender' => $request->input('gender'),
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

    public function search(Request $request)
    {
        $name = $request->search;
        $teacher = Teacher::where('name', 'like', "%" . $name . "%")->orderBy('id', 'desc')->paginate(10);
        
        if (count($teacher) > 0) {
            return view('pagination.pagination_teachers', compact('teacher'))->render();
        } else {
            return redirect()->back()->withErrors('Data tidak ditemukan');
        }
    }

    public function search2(Request $request) {
        $name = $request->search;
        $teacher = Teacher::where('name', 'like', "%" . $name . "%")->orderBy('id', 'desc')->paginate(10);

        $teacher->appends(array(
            'search' => $request->search
        ));
        if (count($teacher) > 0) {
            return view('teacher', compact('teacher'));
        }
    }
}
