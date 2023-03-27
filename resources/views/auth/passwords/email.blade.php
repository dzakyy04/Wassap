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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                Kami telah mengirimkan email, silahkan cek email anda.
                            </div>
                        @endif
                        <img src="{{ asset('img/logo-wassap.png') }}" class="img-fluid" alt="logo wassap" width="200px">
                        <h2 class="text-main fw-bold text-poppins mt-3">Lupa Kata Sandi</h2>
                        <div class="mt-3">
                            <form method="POST" action="{{ route('password.email') }}" class="auth">
                                @csrf
                                {{-- Email --}}
                                <input type="text" class="form-control fs-md mt-3 @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
                                @error('email')
                                    <div class="invalid-feedback fs-md">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <button type="submit" class="btn btn-primary w-100 mt-3">Kirim email</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
