<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password, $remember;

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.app')->section('content');
    }

    public function authenticated(Request $request)
    {
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid.',
            'password.required' => 'Password harus diisi',
        ]);

        if (!Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            $this->addError('email', 'Email atau password salah, Silahkan coba lagi.');
            $this->password = null;
            return null;
        }

        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
