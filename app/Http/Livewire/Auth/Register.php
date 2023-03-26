<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $name, $username, $email, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.app')->section('content');
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:4', 'max:255', 'confirmed'],
        ], [
            'name.required' => 'Nama Lengkap harus diisi.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'username.required' => 'Username harus diisi.',
            'username.min' => 'Username minimal terdiri dari 3 karakter.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'password.required' => 'Kata sandi harus diisi.',
            'password.min' => 'Kata sandi minimal terdiri dari 4 karakter.',
            'password.max' => 'Kata sandi tidak boleh lebih dari 255 karakter.',
            'password.confirmed' => 'Kata sandi tidak sesuai.',
        ]);

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'profile_picture' => asset('img/default-profile.png'),
        ]);

        Auth::login($user, true);

        return redirect()->to('/');
    }
}
