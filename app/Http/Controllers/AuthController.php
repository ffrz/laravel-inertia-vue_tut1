<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'avatar' => 'nullable|file|max:1024|mimes:jpeg,bmp,png',
            'name' => 'required|max:255',
            'email' => 'email|required|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
