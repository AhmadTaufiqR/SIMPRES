<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_login()
    {
        return view('templates.amel.login');
    }

    public function forgot_password()
    {
        return view('templates.amel.forgot-password');
    }

    public function reset_password()
    {
        return view('templates.amel.reset-password');
    }

    public function index_register()
    {
        return view('templates.amel.register');
    }


    public function forgot_password_act(Request $request)
    {
        $customMessage = [
            'username.required'    => 'username tidak boleh kosong',
            'username.username'       => 'username tidak valid',
            'username.exist'       => 'username tidak terdaftar',
        ];

        $request->validate([
            'username' => 'required|username|exists:users,username'
        ], $customMessage);

        [
            'username' => $request->username,
            'created_at' => now(),
        ];

        $user = Admin::where('username', '=', $request->input('username'))->first();

        if ($user) {
            return redirect('reset-password')->with('users', $request->input('username'));
        }
    }

    public function showResetForm()
    {
        return view('templates.amel.reset-password');
    }

    public function showResetForm_act(Request $request)
    {
        $request->validate([
            'password_confirmation' => 'required',
        ]);

        $users = Admin::where('username', '=', $request->input('username'))->first();

        if ($users) {
            $users->password = bcrypt($request->input('password_confirmation'));
            $users->save();
            return redirect('/')->with('Success', 'Kamu berhasil mengubah password');
        }
        return redirect('reset-password')->withErrors('Kamu Gagal');
    }



    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ], [
            'username.required' => 'username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $users = Admin::where('username', $request->username)->first();

        if ($users && Hash::check($request->password, $users->password)) {
            Session::put('name', $users->name);
            Auth::guard('admin')->attempt($credentials);
            $request->session()->regenerate();
            return redirect('headmaster')->with('Success', 'Login Success');
        }

        return back()->with('loginError', 'Login Failed');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:admins,username',
            'email' => 'required|string|unique:admins,email',
            'phone' => 'required',
            'password' => 'required|string|min:8'
        ]);

        $email = $request->email . '@sepatumas.sch.id';

        $admin = Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ]);

        if ($admin) {
            return redirect('/')->with('Success', 'User berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan user');
        }
    }


    /**
     * Display the specified resource.
     */
    public function store_reset_pw(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:3']
        ]);

        $users = Admin::create([
            'username' => $request->username,
            'password' => Hash::make(value: $request->password),
        ]);

        $users = " ";
        if (!$users) {
            return redirect()->route('users.create')->with('success', 'Password berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat password baru');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
