<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::orderBy('id', 'desc')->paginate(10);
        return view('templates.Rayhans.Guru', compact('teacher'));
    }

    public function store(Request $request)
    {

        Session::flash('nip', $request->nip);
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('address', $request->address);
        Session::flash('gender', $request->gender);
        Session::flash('phone', $request->phone);

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
            Session::flush();
            return redirect('/teacher')->with('Success', 'Yeeayy!! Data guru berhasil ditambahkan');
        } else {
            return redirect('/teacher')->withErrors('Data guru gagal ditambahkan');
        }
    }
}
