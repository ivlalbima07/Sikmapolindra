
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/dashboard') }}">
            <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('recap') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/recap') }}">
            <i data-feather='bar-chart'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Recap Kerjasama</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('cooperation') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/cooperation') }}">
            <i data-feather='briefcase'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Kerjasama Dudi</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('implementation') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/implementation') }}">
            <i data-feather='archive'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Pelaksanaan Kerjasama</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('dudi') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/dudi') }}">
            <i data-feather='folder-plus'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Tambah
                Dudi</span>
        </a>
    </li>


    <li class=" nav-item "><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">Klasifikasi Dan Kriteria</span></a>
        <ul class="menu-content">
            <li class="nav-item {{ request()->is('klasifikasi') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ url('/klasifikasi') }}">
                    <i data-feather='circle'></i><span class="menu-title text-truncate" data-i18n="Preview">Klasifikasi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('KlasifikasiBaku') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ url('/KlasifikasiBaku') }}">
                    <i data-feather='circle'></i><span class="menu-title text-truncate" data-i18n="Preview">klasifikasi Baku</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('Kriteria') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ url('/Kriteria') }}">
                    <i data-feather='circle'></i><span class="menu-title text-truncate" data-i18n="Preview">Kriteria</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item {{ request()->is('companions') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('companions') }}">
            <i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Instruktur/Pendamping DUDI</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('operator') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/operator') }}">
            <i data-feather='user'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Operator Satuan</span>
        </a>
    </li>
