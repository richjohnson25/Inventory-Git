@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Pembelian Barang</h1>
        <form class="search-form search-holder">
            <input type="text" name="search" value="{{Request::input('search')}}">
            <button type="submit">Search</button>
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
                    <th scope="col">Status</th>
                    <th colspan="2" scope="colgroup">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock_in_transactions as $stock_in)
                <tr>
                    <td>{{$stock_in->id}}</td>
                    <td>{{$stock_in->order_number}}</td>
                    <td>{{$stock_in->datetime}}</td>
                    <td>{{$stock_in->supplier->user->name}}</td>
                    <td>{{$stock_in->quantity}}</td>
                    <td>{{$stock_in->product->name}}</td>
                    <td>{{$stock_in->status}}</td>
                    @if($role=='admin' && $stock_in->status=='Pending')
                    <td><a href="/stock-in/{{ $stock_in->id }}" class="btn btn-primary">Approve</a></td>
                    <td>
                        <form method="POST" action="/stock-in/{{ $stock_in->id }}">
                            @csrf
                            @method('patch')
                            <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection