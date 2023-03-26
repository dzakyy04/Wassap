@push('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @livewireStyles
@endpush

@push('js')
    @livewireScripts
@endpush

<div class="landing-page">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="left col-md-6 text-center">
                <img src="{{ asset('img/model.png') }}" class="img-fluid model" alt="model" height="400">
            </div>
            <div class="right col-md-6">
                <div>
                    <img src="{{ asset('img/logo-wassap.png') }}" class="img-fluid" alt="logo wassap" width="200px">
                    <h2 class="text-main fw-bold text-poppins mt-3">Selamat Datang Kembali!</h2>
                    <div class="mt-3">
                        <form wire:submit.prevent='authenticated' method="POST" class="auth">
                            {{-- Email --}}
                            <input type="text" class="form-control fs-md mt-3 @error('email') is-invalid @enderror"
                                placeholder="Email" name="email" wire:model.defer='email'>
                            @error('email')
                                <div class="invalid-feedback fs-md">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Password --}}
                            <input type="password"
                                class="form-control mt-3 fs-md @error('password') is-invalid @enderror"
                                placeholder="Kata Sandi" name="password" wire:model.defer='password'>
                            @error('password')
                                <div class="invalid-feedback fs-md">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="d-flex justify-content-between fs-sm mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        style="border-color: var(--main)">
                                    <label class="form-check-label" for="remember">
                                        Ingat saya
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-main">Lupa kata sandi?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Masuk</button>
                            <div class="fs-sm mt-2 text-center">
                                <p class="text-secondary">Belum punya akun? <a href="{{ route('register') }}"
                                        class="text-main">Daftar Sekarang</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
