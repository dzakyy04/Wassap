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
                    <h2 class="text-main fw-bold text-poppins mt-3">Buat Akun Anda Sekarang!</h2>
                    <div class="mt-3">
                        <form wire:submit.prevent='store' class="auth">
                            {{-- Name --}}
                            <input type="text" class="form-control fs-md mt-3 @error('name') is-invalid @enderror"
                                placeholder="Nama Lengkap" name="name" wire:model.defer='name'>
                            @error('name')
                                <div class="invalid-feedback fs-md">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Username --}}
                            <input type="text"
                                class="form-control fs-md mt-3 @error('username') is-invalid @enderror"
                                placeholder="Nama pengguna" name="username" wire:model.defer='username'>
                            @error('username')
                                <div class="invalid-feedback fs-md">
                                    {{ $message }}
                                </div>
                            @enderror

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

                            {{-- Password Confirmation --}}
                            <input type="password" class="form-control mt-3 fs-md" placeholder="Ulangi Kata Sandi"
                                name="password_confirmation" wire:model.defer='password_confirmation'>

                            <button type="submit" class="btn btn-primary w-100 mt-4">Daftar</button>

                            <div class="fs-sm mt-2 text-center">
                                <p class="text-secondary">Sudah punya akun? <a href="{{ route('login') }}"
                                        class="text-main">Masuk Sekarang</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
