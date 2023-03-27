<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#berita" data-bs-toggle="collapse" href="#">
                <i class="bi bi-newspaper"></i>
                <span>Berita saya</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="berita" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Semua berita</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Disetujui</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Belum disetujui</span>
                    </a>
                </li>
            </ul>
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
