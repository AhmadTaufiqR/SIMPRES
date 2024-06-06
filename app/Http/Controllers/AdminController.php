<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function show()
    {
        $admin = Admin::orderBy('id', 'desc')->paginate(10);
        return view('pages.aisyah.admin', ['admin' => $admin]);
    }

    public function store(Request $request)
    {
        
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'phone.required' => 'Nomor telepon tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $email = $request->input('email') . '@sepatumas.sch.id';

        $admin_email = Admin::where('email', $email)->first();
        if ($admin_email) {
            return redirect('/admin')->withErrors('Email sudah terdaftar');
        }

        $admin_username = Admin::where('username', $request->input('username'))->first();
        if ($admin_username) {
            return redirect('/admin')->withErrors('Username sudah terdaftar');
        }

        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $email,
            'username' => $request->input('username'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
        if ($admin) {
            return redirect('admin')->with('Success', 'Data admin berhasil ditambahkan');
        } else {
            return redirect('admin')->withErrors('Data admin gagal ditambahkan');
        }
    }
}
