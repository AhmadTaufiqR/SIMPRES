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

    public function create()
    {
       return view('templates.aisyah.create');
    }
    
    public function store(Request $request)
    {
    //    return view('pages.aisyah.admin');
    $request->validate([
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
    ]);
      $admin = Admin::create([ 
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
    if($admin){
        return redirect('admin')->with('status', 'admin create');
    } else {
        var_dump('kososng');
    }
    }

    // public function edit(int $id)
    // {
    //     $admin = Admin::findOrFail($id);
    //     // return $admin;
    //     return view('admin.edit', compact($admin));
    // }


    public function update(Request $request, int $id) 
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
          Admin::findOrFail($id)->update([ 
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ]);
            return redirect()->back()->with('status', 'admin update');
    }
    public function hapus(int $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            dd('Record not found');
        }
        $admin->delete();
        return redirect()->back()->with('status', 'Admin berhasil dihapus');
    }
}
