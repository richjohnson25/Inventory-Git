@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Pembelian Barang</h1>
        <form class="search-form search-holder">
        <input type="text" name="search" value="{{Request::input('search')}}">
            <button type="submit" class="searchBtn">Search</button>
        </form>
        @if($role=='user')
        <div class="addButton">
            <a href="/stock-in/create">Tambah Transaksi Pembelian</a>
        </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Pembelian</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Nama Barang</th>
                    <th colspan="2" scope="colgroup">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock_in_transactions as $stock_in)
                <tr>
                    <td>{{$stock_in->id}}</td>
                    <td>{{$stock_in->order_number}}</td>
                    <td>{{$stock_in->datetime}}</td>
                    <td>{{$stock_in->supplier->name}}</td>
                    <td>{{$stock_in->quantity}}</td>
                    <td>{{$stock_in->product->name}}</td>
                    <td><a href="/stock-in/{{ $stock_in->id }}" class="btn btn-info">View</a></td>
                    @if($role=='admin')
                    <form action="/stock-in/{{ $stock_in->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <td><button type="submit" class="btn btn-danger">Delete</button></td>
                    </form>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection