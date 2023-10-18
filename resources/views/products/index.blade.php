@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Barang</h1>
        <form action="{{ route('product_search') }}" class="search-form form-holder" method="GET">
            <input type="text" name="search" placeholder="Search">
            <button type="submit">Search</button>
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
                    <th rowspan="2" colspan="2" scope="colgroup">Action</th>
                </tr>
                <tr>
                    <th scope="col">Qty</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
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
                    <td><a href="/products/{{ $product->id }}" class="btn btn-info">View</a></td>
                    @if($role=='admin')
                    <form action="/products/{{ $product->id }}" method="POST">
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