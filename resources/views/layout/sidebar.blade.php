<div class="sidenav" id="sidenav">
    <button onclick="closeSidenav()" class="sidenav-btn">MENU &times;</button>
    <a href="/dashboard">Dashboard</a>
    <button class="dropdown-btn">Data Master
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/products/index">Barang</a>
        <a href="{{ route('suppliers.index') }}">Supplier</a>
        <a href="{{ route('customers.index') }}">Customer</a>
        <a href="/categories/index">Kategori</a>
        <a href="/units/index">Unit</a>
    </div>
    <button class="dropdown-btn">Stok Barang Masuk
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock-in/index">Daftar Pembelian</a>
        <a href="/stock-in/reportMenu">Laporan Pembelian</a>
    </div>
    <button class="dropdown-btn">Stok Barang Keluar
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock-out/index">Daftar Penjualan</a>
        <a href="/stock-out/reportMenu">Laporan Penjualan</a>
    </div>
</div>