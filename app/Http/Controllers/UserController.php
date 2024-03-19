<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Auth\Notifications\ResetPassword;

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
            'email.required'    => 'Email tidak boleh kosong',
            'email.email'       => 'Email tidak valid',
            'email.exist'       => 'Email tidak terdaftar',
        ];

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], $customMessage);

        [
            'email' => $request->email,
            'created_at' => now(),
        ];

        $user = User::where('email', '=', $request->input('email'))->first();

        if ($user) {
            return redirect('reset-password')->with('users', $request->input('email'));
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

        $users = User::where('email', '=', $request->input('email'))->first();

        if ($users) {
            $users->password = bcrypt($request->input('password_confirmation'));
            $users->save();
            return redirect('/')->with('Success', 'Kamu berhasil mengubah password');
        }
        return redirect('reset-password')->withErrors('Kamu Gagal');
    }



    public function login(Request $request)
    {
            $credentials = $request->validate([
                'email' => ['required'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
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
            'email' => 'required|string|email:dns|unique:users',
            'password' => 'required|string|min:8'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return to_route('login');
    }


    /**
     * Display the specified resource.
     */
    public function store_reset_pw(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:3']
        ]);

        $users = User::create([
            'email' => $request->email,
            'password' => Hash::make(value: $request->password),
        ]);

        $user = " ";
        if (!$user) {
            return redirect()->route('users.create')->with('success', 'Password berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat password baru');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
