<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::segment(2) == 'berita-saya' ? 'active' : '' }}" href="{{ route('my-articles') }}">
                <i class="bi bi-newspaper"></i>
                <span>Berita saya</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::segment(2) == 'tulis-berita' ? 'active' : '' }}" href="{{ route('create-news') }}">
                <i class="bi bi-pen"></i>
                <span>Tulis berita</span>
            </a>
        </li>

        <li class="nav-heading">Admin</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#admin" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i>
                <span>Pengguna</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Admin</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#berita_admin" data-bs-toggle="collapse" href="#">
                <i class="bi bi-newspaper"></i>
                <span>Berita</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="berita_admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Semua Berita</span>
                    </a>
                </li>
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Disetujui</span>
                    </a>
                </li>
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Belum disetujui</span>
                    </a>
                </li>
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Kategori</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</aside><!-- End Sidebar-->
