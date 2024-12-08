<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function indexRegister()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function indexReset()
    {
        return view('auth.reset-password', [
            'title' => 'Reset Password'
        ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $email = $validated['email'];
        $password = bcrypt($validated['password']);

        $user = new User();
        $user->username = $validated['username'];
        $user->email = $email;
        $user->password = $password;
        $user->role = "pelapor";
        $user->save();

        $input = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function login(Request $request)
    {
        $input = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $level = User::where('username', $input['username'])->value('role');

        if ($level == 'admin') {
            if (Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }
            return back()->with('error', 'Username atau Password tidak sesuai !');
        } elseif ($level == 'hse') {
            if (Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) {
                $request->session()->regenerate();
                return redirect()->route('hse.dashboard');
            }
            return back()->with('error', 'Username atau Password tidak sesuai !');
        } else {
            if (Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }
            return back()->with('error', 'Username atau Password tidak sesuai !');
        }

        return back()->with('error', 'Username atau Password tidak sesuai !');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
