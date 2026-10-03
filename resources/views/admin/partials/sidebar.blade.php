<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">PPLG</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('admin-pplg') ? 'active' : '' }}">
            <a href="/admin-pplg" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/data-sekolah') ? 'active' : '' }}">
            <a href="/admin-pplg/data-sekolah" class="menu-link">
                <i class="menu-icon tf-icons bx bx-building"></i>
                <div data-i18n="Analytics">Data Sekolah</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/data-jurusan') ? 'active' : '' }}">
            <a href="/admin-pplg/data-jurusan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="Analytics">Data Jurusan</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/data-alumni') ? 'active' : '' }}">
            <a href="/admin-pplg/data-alumni" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Data Alumni</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/jumbotron') ? 'active' : '' }}">
            <a href="/admin-pplg/jumbotron" class="menu-link">
                <i class="menu-icon tf-icons bx bx-image"></i>
                <div data-i18n="Analytics">Jumbotron</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/about') ? 'active' : '' }}">
            <a href="/admin-pplg/about" class="menu-link">
                <i class="menu-icon tf-icons bx bx-info-circle"></i>
                <div data-i18n="Analytics">About</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/category') ? 'active' : '' }}">
            <a href="/admin-pplg/category" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Analytics">Kategori</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/article') ? 'active' : '' }}">
            <a href="/admin-pplg/article" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file-blank"></i>
                <div data-i18n="Analytics">Artikel</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/keahlian') ? 'active' : '' }}">
            <a href="/admin-pplg/keahlian" class="menu-link">
                <i class="menu-icon tf-icons bx bx-brush"></i>
                <div data-i18n="Analytics">Keahlian</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/teacher') ? 'active' : '' }}">
            <a href="/admin-pplg/teacher" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-voice"></i>
                <div data-i18n="Analytics">Pengajar</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/mapel') ? 'active' : '' }}">
            <a href="/admin-pplg/mapel" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="Analytics">Mata Pelajaran</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/software') ? 'active' : '' }}">
            <a href="/admin-pplg/software" class="menu-link">
                <i class="menu-icon tf-icons bx bx-laptop"></i>
                <div data-i18n="Analytics">Software</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/karya-siswa') ? 'active' : '' }}">
            <a href="/admin-pplg/karya-siswa" class="menu-link">
                <i class="menu-icon tf-icons bx bx-laptop"></i>
                <div data-i18n="Analytics">Karya Siswa</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin-pplg/banner*') ? 'active' : '' }}">
            <a href="/admin-pplg/banner" class="menu-link">
                <i class="menu-icon tf-icons bx bx-broadcast"></i>
                <div data-i18n="Analytics">Iklan Hotspot</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ request()->is('admin-pplg/logout') ? 'active' : '' }}">
            <a href="/logout" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Analytics">Logout</div>
            </a>
        </li> --}}
    </ul>
</aside>
<!-- / Menu -->
