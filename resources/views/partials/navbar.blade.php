<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo-wassap.png') }}" alt="logo wassap" width="120">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center ms-auto mb-2 mb-lg-0">
                <li class="nav-item rounded px-2">
                    <a class="nav-link text-main {{ Request::segment(1) == '' ? 'active' : '' }}"
                        href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item rounded px-2">
                    <a class="nav-link text-main {{ Request::segment(1) == 'berita' ? 'active' : '' }}"
                        href="">Berita</a>
                </li>
                <li class="nav-item rounded px-2">
                    <a class="nav-link text-main" {{ Request::segment(0) == 'kategori' ? 'active' : '' }}
                        href="#">Kategori</a>
                </li>
                <li class="nav-item rounded px-2">
                    <a class="nav-link text-main {{ Request::segment(0) == 'tentang' ? 'active' : '' }}"
                        href="#">Tentang</a>
                </li>
                @auth
                    <li class="nav-item rounded px-2 dropdown">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            <img src="{{ auth()->user()->profile_picture }}" alt="Profile" class="rounded-circle photo">
                            <span class="dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
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
                                <a href="/" class="dropdown-item d-flex align-items-center" href="users-profile.html">
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
                    <li class="nav-item rounded px-2 login">
                        <a class="nav-link text-white" href="{{ route('login') }}"><i
                                class="bi bi-box-arrow-in-right me-1 text-white"></i> Masuk</a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
