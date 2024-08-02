
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/dashboard/chart') }}">
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
    <li class="nav-item {{ request()->is('tambahDudi') ? 'active' : '' }}">
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

    <li class="nav-item {{ request()->is('companion') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/companion') }}">
            <i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Instruktur/Pendamping DUDI</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('operator') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/operator') }}">
            <i data-feather='user'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Operator Satuan</span>
        </a>
    </li>
    {{-- <li class="nav-item {{ request()->is('resetpassword') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/resetpassword') }}">
            <i data-feather='key'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Ganti kata sandi</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('') }}">
            <i data-feather='log-out'></i><span class="menu-title text-truncate" data-i18n="Dashboard">Log-Out</span>
        </a>
    </li> --}}

    {{-- <li class="nav-item {{ request()->is('storages/dashboard') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('storages/dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a></li>
<li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="database"></i><span class="menu-title text-truncate" data-i18n="Data Master">Data Master</span></a>
    <ul class="menu-content">
        <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="briefcase"></i><span class="menu-title text-truncate" data-i18n="Barang">Barang</span></a>
            <ul class="menu-content">
                <li class="{{ request()->routeIs('storages.liquid-items*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.liquid-items.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Cair">Cair</span></a>
                </li>
                <li class="{{ request()->routeIs('storages.solid-items*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.solid-items.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Padat">Padat</span></a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->routeIs('storages.categories*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.categories.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Kategori">Kategori</span></a>
        </li>
        <li class="{{ request()->routeIs('storages.units*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.units.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Satuan">Satuan</span></a>
        </li>
        <li class="{{ request()->routeIs('storages.flavours*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.flavours.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Klasifikasi">Klasifikasi</span></a>
        <li class="{{ request()->routeIs('storages.suppliers*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.suppliers.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Supplier">Supplier</span></a>
        <li class="{{ request()->routeIs('storages.storages*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.storages.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Rak">Rak</span></a>
    </ul>
</li>
<li class="nav-item {{ request()->routeIs('storages.order-items*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.order-items.index') }}"><i data-feather="folder-plus"></i><span class="menu-title text-truncate" data-i18n="Permintaan">
    Permintaan</span> <span class="badge"> {{ DB::table('stock_orders')->where('status', 'New')->count() }} </span>  </a>
</li>
<li class="nav-item {{ request()->routeIs('storages.receipt-items*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.receipt-items.index') }}"><i data-feather="shopping-bag"></i><span class="menu-title text-truncate" data-i18n="Penerimaan">Penerimaan Gudang</span></a>
</li>
<li class="nav-item {{ request()->routeIs('storages.stock-opnames*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.stock-opnames.index') }}"><i data-feather="package"></i><span class="menu-title text-truncate" data-i18n="Stok Opname">Stok Opname</span></a>
</li>
<li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="archive"></i><span class="menu-title text-truncate" data-i18n="Expend">Expend</span></a>
    <ul class="menu-content">
        <li class="nav-item {{ request()->routeIs('storages.store-expends*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.store-expends.index') }}"><i data-feather="circle"></i><span class="menu-title text-truncate" data-i18n="Toko">Toko</span></a></li>
        <li class="nav-item {{ request()->routeIs('storages.warehouse-expends*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.warehouse-expends.index') }}"><i data-feather="circle"></i><span class="menu-title text-truncate" data-i18n="Gudang">Gudang</span></a></li>
    </ul>
</li>
<li class="nav-item {{ request()->routeIs('storages.returns*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.returns.index') }}"><i data-feather="refresh-cw"></i><span class="menu-title text-truncate" data-i18n="Retur">Retur</span></a>
</li>
</li>
<li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Laporan">Laporan</span></a>
    <ul class="menu-content">
        <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="package"></i><span class="menu-title text-truncate" data-i18n="Barang">Barang</span></a>
            <ul class="menu-content">
            <li class="{{ request()->routeIs('storages.out-item-reports*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.out-item-reports') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Keluar">Keluar</span></a></li>
            <li class="{{ request()->routeIs('storages.report-stock.in*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.report-stock.in') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Stok Masuk">Stok Masuk</span></a></li>
            <li class="{{ request()->routeIs('storages.report-stock.out*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.report-stock.out') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Stok Keluar">Stok Keluar</span></a></li>
            </ul>
        </li>
    </ul>
</li>
<li class="nav-item {{ request()->routeIs('storages.report-stock/fsn*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ url('storages/report-stock/fsn/-/-/-') }}"><i data-feather="refresh-cw"></i><span class="menu-title text-truncate" data-i18n="Perputaran Stok">Perputaran Stok</span></a></li>
<li class="navigation-header"><span data-i18n="Lainnya">Lainnya</span><i data-feather="more-horizontal"></i></li>
<li class="nav-item {{ request()->routeIs('storages.user.edit*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('storages.user.edit', Auth::id()) }}"><i data-feather="edit"></i><span class="menu-title text-truncate" data-i18n="Edit Profile">Edit Profile</span></a></li>
<li class="nav-item"><a class="d-flex align-items-center" href="#" id="logout-app"><i data-feather="log-out"></i><span class="menu-title text-truncate" data-i18n="Logout">Logout</span></a></li> --}}
