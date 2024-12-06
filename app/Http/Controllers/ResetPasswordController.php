<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function checkEmail($email)
    {
        $user = User::where('email', $email)->first();
        return response()->json($user);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6', // Add 'confirmed' if you have a confirmation field
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->route('login')->with('success', 'Password berhasil diubah!');
        }

        return redirect()->back()->with('error', 'Gagal mengubah password. Email tidak ditemukan.');
    }

    public function gantiPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6', // Add 'confirmed' if you have a confirmation field
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil diubah!');
        }

        return redirect()->back()->with('error', 'Gagal mengubah password. Email tidak ditemukan.');
    }

    public function indexGantiPassword()
    {
        return view('menu.ganti-password.index', [
            'title' => 'Ganti Password'
        ]);
    }
}
