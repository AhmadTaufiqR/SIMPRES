<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        $admin = Admin::all();
        return view('pages.aisyah.admin', ['admin' => $admin]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
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
            'username' => $request->input('username'),
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
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
