@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
    <div class="landing-page">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="left col-md-6 text-center">
                    <img src="{{ asset('img/model.png') }}" class="img-fluid model" alt="model" height="400">
                </div>
                <div class="right col-md-6">
                    <div>
                        <img src="{{ asset('img/logo-wassap.png') }}" class="img-fluid" alt="logo wassap" width="200px">
                        <h2 class="text-main fw-bold text-poppins mt-3">Lupa Kata Sandi</h2>
                        <div class="mt-3">
                            <form method="POST" action="{{ route('password.update') }}" class="auth">
                                @csrf
                                {{-- Token --}}
                                <input type="hidden" name="token" value="{{ $token }}">


                                {{-- Email --}}
                                <input type="text" class="form-control fs-md mt-3 @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required
                                    autofocus>
                                @error('email')
                                    <div class="invalid-feedback fs-md">
                                        {{ $message }}
                                    </div>
                                @enderror

                                {{-- Password --}}
                                <input type="password"
                                    class="form-control mt-3 fs-md @error('password') is-invalid @enderror"
                                    placeholder="Kata Sandi" name="password">
                                @error('password')
                                    <div class="invalid-feedback fs-md">
                                        {{ $message }}
                                    </div>
                                @enderror

                                {{-- Password Confirmation --}}
                                <input type="password" class="form-control mt-3 fs-md" placeholder="Ulangi Kata Sandi"
                                    name="password_confirmation">

                                <button type="submit" class="btn btn-primary w-100 mt-3">Perbarui Kata Sandi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
