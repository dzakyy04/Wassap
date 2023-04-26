@extends('dashboard.layouts.main')
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($categories->pluck('name')) !!},
                datasets: [{
                    label: 'Jumlah berita per kategori',
                    data: {!! json_encode(
                        $categories->map(function ($category) {
                            return $category->articles->count();
                        }),
                    ) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    @livewireScripts
@endpush
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

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
                        <a href="{{ route('my-articles', ['status' => 'disetujui']) }}" class="card info-card green-card">
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
                        <a href="{{ route('my-articles', ['status' => 'belum-disetujui']) }}"
                            class="card info-card yellow-card">
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
                </div>
            </div>
        </div>
    </section>

    @can('admin')
        <div class="pagetitle">
            <h1>Admin</h1>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        {{-- User --}}
                        <div class="col-xxl-4 col-md-4">
                            <a href="{{ route('admin.user') }}" class="card info-card blue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Pengguna</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $total_users }}</h6>
                                            <span class="text-secondary small pt-1 fw-bold">Pengguna</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-4 col-md-4">
                            <a href="{{ route('admin.admin') }}" class="card info-card green-card">
                                <div class="card-body">
                                    <h5 class="card-title">Admin</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $total_admin }}</h6>
                                            <span class="text-secondary small pt-1 fw-bold">Admin</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-xxl-4 col-md-4">
                            <a href="{{ route('admin.article', ['status' => '']) }}" class="card info-card blue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Semua Berita</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $all_articles }}</h6>
                                            <span class="text-secondary small pt-1 fw-bold">Berita</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-4 col-md-4">
                            <a href="{{ route('admin.article', ['status' => 'disetujui']) }}"
                                class="card info-card green-card">
                                <div class="card-body">
                                    <h5 class="card-title">Disetujui</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $all_approved }}</h6>
                                            <span class="text-secondary small pt-1 fw-bold">Berita</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-4 col-md-4">
                            <a href="{{ route('admin.article', ['status' => 'belum-disetujui']) }}"
                                class="card info-card yellow-card">
                                <div class="card-body">
                                    <h5 class="card-title">Belum Disetujui</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $all_not_approved }}</h6>
                                            <span class="text-secondary small pt-1 fw-bold">Berita</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-4 col-md-4">
                            <a href="{{ route('admin.article', ['headline' => 'ya']) }}"
                                class="card info-card red-card">
                                <div class="card-body">
                                    <h5 class="card-title">Berita Utama</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $all_headlines }}</h6>
                                            <span class="text-secondary small pt-1 fw-bold">Berita</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Laporan berita</h5>
                                    <canvas id="myChart" class="w-100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endcan
@endsection
