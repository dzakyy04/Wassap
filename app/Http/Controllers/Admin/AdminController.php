<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.admin.index');
    }

    public function create()
    {
        return view('dashboard.admin.admin.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
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

        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'profile_picture' => asset('img/default-profile.png'),
            'is_admin' => true
        ]);

        return redirect()->route('admin.admin')->with('success', 'Admin baru berhasil ditambahkan');;
    }
}
