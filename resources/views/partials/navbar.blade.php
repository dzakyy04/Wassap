<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo-wassap.png') }}" alt="logo wassap" width="120">
        </a>
        <div class="navbar-brand ms-auto search-1 d-none">
            <div data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="text-main bi bi-search"></i>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center ms-auto mb-2 mb-lg-0">
                <li class="nav-item rounded">
                    <a class="nav-link text-main {{ Request::segment(1) == '' ? 'active' : '' }}"
                        href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item rounded">
                    <a class="nav-link text-main {{ Request::segment(1) == 'berita' ? 'active' : '' }}"
                        href="{{ route('articles.index') }}">Berita</a>
                </li>
                <li class="nav-item rounded">
                    <a class="nav-link text-main" {{ Request::segment(0) == 'kategori' ? 'active' : '' }}
                        href="#">Kategori</a>
                </li>
                <li class="nav-item rounded">
                    <a class="nav-link text-main {{ Request::segment(0) == 'penulis' ? 'active' : '' }}"
                        href="#">Penulis</a>
                </li>
                <li class="nav-item rounded mx-3 search-2">
                    <div data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="text-main bi bi-search"></i>
                    </div>
                </li>
                @auth
                    <li class="nav-item rounded dropdown">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            <img src="{{ auth()->user()->profile_picture }}" alt="Profile" class="rounded-circle photo">
                            <span class="dropdown-toggle text-main ps-2">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile position-absolute">
                            <li class="dropdown-header">
                                <h6>{{ auth()->user()->name }}</h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-person"></i>
                                    <span>Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a href="{{ route('dashboard') }}" class="dropdown-item d-flex align-items-center"
                                    href="users-profile.html">
                                    <i class="bi bi-grid"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Keluar</span>
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </li>
                @else
                    <li class="nav-item rounded login">
                        <a class="nav-link text-white" href="{{ route('login') }}"><i
                                class="bi bi-box-arrow-in-right me-1 text-white"></i> Masuk</a>
                    </li>
                @endauth
            </ul>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ route('articles.index') }}" method="GET">
                            <h3 class="text-main">Pencarian</h3>
                            <input type="text" class="form-control search-box mt-2" name="cari" placeholder="Cari..." autofocus>

                            <div class="buttons d-flex justify-content-end mt-3">
                                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
