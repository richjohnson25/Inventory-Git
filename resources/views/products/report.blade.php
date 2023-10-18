@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Laporan Stock per Barang</h1>
        <h3>{{ $product->name }} ({{ $product->code }})</h3>
        <h5>Satuan Barang: {{ $product->unit->name }}</h5>
        <form class="search-form">
            <input type="text" name="search" value="{{Request::input('search')}}">
            <button type="submit">Search</button>
        </form>

        <h3>STOK MASUK</h3>
        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2" scope="col">No.</th>
                    <th rowspan="2" scope="col">Kode Transaksi</th>
                    <th rowspan="2" scope="col">Tanggal Transaksi</th>
                    <th rowspan="2" scope="col">Saldo Awal</th>
                    <th rowspan="2" scope="col">Mutasi Barang</th>
                    <th rowspan="2" scope="col">Saldo Akhir</th>
                </tr>
                <tr>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock_in_transactions as $stock_in)
                <tr>
                    <td>{{$stock_in->id}}</td>
                    <td>{{$stock_in->order_number}}</td>
                    <td>{{$stock_in->datetime}}</td>
                    <td>{{$stock_in->initial_quantity}}</td>
                    <td>{{$stock_in->initial_value}}</td>
                    <td>{{$stock_in->quantity}}</td>
                    <td>{{$stock_in->value}}</td>
                    <td>{{$stock_in->new_quantity}}</td>
                    <td>{{$stock_in->new_value}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>STOK KELUAR</h3>
        <table class="table">
            <thead>
                <tr>
                    <th rowspan="2" scope="col">No.</th>
                    <th rowspan="2" scope="col">Kode Transaksi</th>
                    <th rowspan="2" scope="col">Tanggal Transaksi</th>
                    <th rowspan="2" scope="col">Saldo Awal</th>
                    <th rowspan="2" scope="col">Mutasi Barang</th>
                    <th rowspan="2" scope="col">Saldo Akhir</th>
                </tr>
                <tr>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
            @foreach($stock_out_transactions as $stock_out)
                <tr>
                    <td>{{$stock_out->id}}</td>
                    <td>{{$stock_out->order_number}}</td>
                    <td>{{$stock_out->datetime}}</td>
                    <td>{{$stock_out->initial_quantity}}</td>
                    <td>{{$stock_out->initial_value}}</td>
                    <td>{{$stock_out->quantity}}</td>
                    <td>{{$stock_out->value}}</td>
                    <td>{{$stock_out->new_quantity}}</td>
                    <td>{{$stock_out->new_value}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection