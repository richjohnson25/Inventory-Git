@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Tambah Transaksi Penjualan Barang</h1>
        <form class="row g-3" action="{{ route('storeStockOut') }}" method="POST" oninput="total_price.value=parseInt(quantity.value)*parseInt(price.value)">
            @csrf
            <div class="col-md-4" id="stock_out_number">
                <label for="order_number" class="form-label">No. Penjualan</label>
                <input type="text" class="form-control" id="order_number" name="order_number" autocomplete="off" value="PS">

                @error('order_number')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4" id="stock_out_date">
                <label for="datetime" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="datetime" name="datetime">

                @error('datetime')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4" id="stock_out_customer_name">
                <label for="customer_id" class="form-label">Customer</label>
                <select id="customer_id" name="customer_id" class="form-select">
                    <option selected value="">Choose...</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{$customer->name}}</option>
                    @endforeach
                </select>

                @error('supplier_name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4" id="stock_out_item_name">
                <label for="product_id" class="form-label">Nama Barang</label>
                <select id="product_id" name="product_id" class="form-select">
                    <option selected value="">Choose...</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{$product->name}}</option>
                    @endforeach
                </select>

                @error('item_name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-2" id="stock_available">
                <label for="stock_per_unit" class="form-label">Stok/Unit</label>
                <input type="number" class="form-control" id="stock_per_unit" name="stock_per_unit" readonly>
            </div>
            <div class="col-md-2" id="stock_out_quantity_input">
                <label for="stock_out_quantity" class="form-label">Kuantitas</label>
                <input type="number" class="form-control" id="stock_out_quantity" name="quantity" min="0">

                @error('quantity')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-2" id="stock_out_price">
                <label for="price" class="form-label">Harga per unit</label>
                <input type="number" class="form-control" id="price" name="price" min="0" step="10000">

                @error('price')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-2" id="stock_out_total">
                <label for="total_price" class="form-label">Total Harga</label>
                <input type="number" class="form-control" id="total_price" name="total_price" value=output for="quantity price" disabled></input>
            </div>
            <div class="col-12" id="stock_out_notes">
                <label for="notes" class="form-label">Catatan</label><br>
                <input type="text" class="form-control" id="notes" name="notes">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Ajukan Transaksi Penjualan</button> 
            </div>
        </form>
    </div>
</div>
@endsection