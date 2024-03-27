<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Headmaster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class HeadmasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headmaster = Headmaster::orderBy('created_at', 'desc')->first();

        if ($headmaster) {
            return view('templates.adel.headmasters', ['headmaster' => $headmaster]);
        }
        return view('templates.adel.headmasters');
    }

    public function setting()
    {
        $headmaster = Headmaster::orderBy('created_at', 'desc')->first();
        return view('templates.adel.template', ['headmaster' => $headmaster]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ], [
            'nip.required' => 'nip harus diisi',
            'name.required' => 'name harus diisi',
            'username.required' => 'username harus diisi',
            'password.required' => 'password harus diisi',
            'phone.required' => 'phone harus diisi',
            'address.required' => 'address harus diisi',

        ]);
        Headmaster::create([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'phone' => $request->input('phone'),
            'address' => $request->input(('address')),
        ]);
        return redirect('headmaster')->with('status', 'Data Berhasil Ditambah');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $headmaster = Headmaster::where('nip', $request->input('nip'))->firstOrFail();
        $headmaster->nip = $request->input('nip');
        $headmaster->name = $request->input('name');
        $headmaster->username = $request->input('username');
        $headmaster->phone = $request->input('phone');
        $headmaster->address = $request->input('address');
        $headmaster->save();
        return redirect('headmaster')->with('Success', 'Data Berhasil Diubah');
    }

    public function passwordUpdate(Request $request)
    {
        $headmaster = Headmaster::where('username', $request->input('username'))->firstOrFail();
        $headmaster->password = bcrypt($request->input('password'));
        $headmaster->save();
        return redirect('headmaster')->with('Success', 'Password Berhasil Diubah');
    }

}
