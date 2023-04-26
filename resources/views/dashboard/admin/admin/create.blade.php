@extends('dashboard.layouts.main')
@push('css')
    @livewireStyles
@endpush
@push('js')
    @livewireScripts
@endpush
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Tambah Admin</h5>

                        <form action="{{ route('admin.store-admin') }}" method="post" class="auth">
                            @csrf
                            {{-- Name --}}
                            <input type="text" class="form-control fs-md mt-3 @error('name') is-invalid @enderror"
                                placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback fs-md">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Username --}}
                            <input type="text" class="form-control fs-md mt-3 @error('username') is-invalid @enderror"
                                placeholder="Nama pengguna" name="username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback fs-md">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Email --}}
                            <input type="text" class="form-control fs-md mt-3 @error('email') is-invalid @enderror"
                                placeholder="Email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback fs-md">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Password --}}
                            <input type="password" class="form-control mt-3 fs-md @error('password') is-invalid @enderror"
                                placeholder="Kata Sandi" name="password">
                            @error('password')
                                <div class="invalid-feedback fs-md">
                                    {{ $message }}
                                </div>
                            @enderror

                            {{-- Password Confirmation --}}
                            <input type="password" class="form-control mt-3 fs-md" placeholder="Ulangi Kata Sandi"
                                name="password_confirmation">

                            <button type="submit" class="btn btn-primary mt-4">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
