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
        $admin = Admin::all();
        return view('pages.aisyah.admin', ['admin' => $admin]);
    }

    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('username', $request->username);
        Session::flash('phone', $request->phone);

        
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
        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
        if ($admin) {
            return redirect('admin')->with('Success', 'Data admin berhasil ditambahkan');
        } else {
            var_dump('kososng');
        }
    }

    public function update(Request $request, int $id)
    {
        Admin::findOrFail($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->back()->with('Success', 'Data admin berhasil diubah');
    }
    public function hapus(int $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            dd('Record not found');
        }
        $admin->delete();
        return redirect()->back()->with('Success', 'Data admin berhasil dihapus');
    }
}
