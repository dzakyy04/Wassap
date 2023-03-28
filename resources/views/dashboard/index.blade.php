@extends('dashboard.layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    {{-- User --}}
                    <div class="col-xxl-4 col-md-4">
                        <a href="{{ route('my-articles') }}" class="card info-card blue-card">
                            <div class="card-body">
                                <h5 class="card-title">Berita saya</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $total_articles }}</h6>
                                        <span class="text-secondary small pt-1 fw-bold">Berita</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-4 col-md-4">
                        <a href="{{ route('my-articles.approved') }}" class="card info-card green-card">
                            <div class="card-body">
                                <h5 class="card-title">Disetujui</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $approved }}</h6>
                                        <span class="text-secondary small pt-1 fw-bold">Berita</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-xxl-4 col-md-4">
                        <a href="{{ route('my-articles.not-approved') }}" class="card info-card yellow-card">
                            <div class="card-body">
                                <h5 class="card-title">Belum Disetujui</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $not_approved }}</h6>
                                        <span class="text-secondary small pt-1 fw-bold">Berita</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- Admin --}}
                    @if (auth()->user()->isAdmin)
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card user-card">
                                <div class="card-body">
                                    <h5 class="card-title">Pengguna</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-primary small pt-1 fw-bold">Orang</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card admin-card">
                                <div class="card-body">
                                    <h5 class="card-title">Admin</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-primary small pt-1 fw-bold">Orang</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
