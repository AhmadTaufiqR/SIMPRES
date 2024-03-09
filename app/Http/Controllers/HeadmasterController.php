<?php

namespace App\Http\Controllers;

use App\Models\headmaster;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class HeadmasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headmaster = headmaster::orderBy('created_at', 'desc')->first();

        if ($headmaster) {
            return view('templates.adel.headmasters', ['headmaster' => $headmaster]);
        }
        return view('templates.adel.headmasters');
    }

    public function setting()
    {
        $headmaster = headmaster::orderBy('created_at', 'desc')->first();
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
        headmaster::create([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'phone' => $request->input('phone'),
            'address' => $request->input(('address')),
        ]);
        return redirect('headmaster')->with('status', 'Data Berhasil Ditambah');

        // $this->validate($request, rules: [
        //     'nip'       => 'required',
        //     'name'      => 'required',
        //     'username'  => 'required|min:6',
        //     'password'  => 'required|min:8',
        //     'phone'     => 'required',
        //     'address'   => 'required',
        // ]);
        // headmaster::create([
        //     'nip'       => $request->nip,
        //     'name'      => $request->name,
        //     'username'  => $request->username,
        //     'password'  => $request->password,
        //     'phone'     => $request->phone,
        //     'address'   => $request->address,
        // ]);
        // return redirect()->route(route:'templates.adel.template')->with(key:['succes'=>'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(headmaster $headmaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, headmaster $headmaster)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(headmaster $headmaster)
    {
        //
    }
}
