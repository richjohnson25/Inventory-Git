@extends('layout.template')

@section('body')
<div class="sidenav">
    <h3>MENU</h3>
    <a href="/dashboard">Dashboard</a>
    <button class="dropdown-btn" id="active">Barang
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/products" id="sub_menu">Daftar Barang</a>
    </div>
    <button class="dropdown-btn">Supplier
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/suppliers">Daftar Supplier</a>
    </div>
    <button class="dropdown-btn">Customer
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/customers">Daftar Customer</a>
    </div>
    <button class="dropdown-btn">Stok Barang Masuk
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock_in/index">Daftar Pembelian</a>
        <a href="/stock_in/chooseDate">Laporan Pembelian</a>
    </div>
    <button class="dropdown-btn">Stok Barang Keluar
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
        <a href="/stock_out/index">Daftar Penjualan</a>
        <a href="/stock-out-report">Laporan Penjualan</a>
    </div>
</div>
<div class="main-bg">
    <div class="main">
        <h2 class="title">DAFTAR BARANG</h2>
        <form action="{{ route('product_search') }}" class="search-form" method="GET">
            <div class="form-holder">
                <input type="text" name="search" placeholder="Search">
                <button type="submit">Search</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2" scope="col">No.</th>
                    <th rowspan="2" scope="col">Kode</th>
                    <th rowspan="2" scope="col">Nama</th>
                    <th rowspan="2" scope="col">Kategori</th>
                    <th rowspan="2" scope="col">Satuan</th>
                    <th rowspan="2" scope="col">Supplier</th>
                    <th colspan="2" scope="colgroup">Saldo</th>
                    <th rowspan="2" scope="col">Action</th>
                </tr>
                <tr>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                @if($products->isNotEmpty())
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->unit->name}}</td>
                        <td>{{$product->supplier->user->name}}</td>
                        <td>{{$product->current_quantity}}</td>
                        <td>{{$product->current_value}}</td>
                        <td>
                            <form action="/products/index/{{ $product->id }}" method="POST">
                                <a href="/products/report/{{ $product->id }}" class="btn btn-primary">Edit</a>
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No data found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection