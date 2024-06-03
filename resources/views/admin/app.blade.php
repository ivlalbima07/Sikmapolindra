@extends('layouts.header')

@section('menu')
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/dashboard') }}">
            <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('recap') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/recap') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-clipboard-data" viewBox="0 0 16 16">
                <path
                    d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0z" />
                <path
                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                <path
                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
            </svg><span class="menu-title text-truncate" data-i18n="Dashboard">Recap Kerjasama</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('cooperation') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/cooperation') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-clipboard2-plus" viewBox="0 0 16 16">
                <path
                    d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z" />
                <path
                    d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                <path d="M8.5 6.5a.5.5 0 0 0-1 0V8H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V9H10a.5.5 0 0 0 0-1H8.5z" />
            </svg></i><span class="menu-title text-truncate" data-i18n="Dashboard">Kerjasama Dudi</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('implementation') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/implementation') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building"
                viewBox="0 0 16 16">
                <path
                    d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                <path
                    d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
            </svg><span class="menu-title text-truncate" data-i18n="Dashboard">Pelaksanaan Kerjasama</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('companion') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/companion') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-vcard" viewBox="0 0 16 16">
                <path
                    d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                <path
                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
            </svg></i><span class="menu-title text-truncate" data-i18n="Dashboard">Instruktur/Pendamping DUDI</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('operator') ? 'active' : '' }}">
        <a class="d-flex align-items-center" href="{{ url('/operator') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
            </svg><span class="menu-title text-truncate" data-i18n="Dashboard">Operator Satuan</span>
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
@endsection
