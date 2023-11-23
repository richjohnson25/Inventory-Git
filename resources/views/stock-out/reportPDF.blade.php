<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Pembelian Barang</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <h1>{{ $title }}</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Pembelian</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Harga per Unit</th>
                    <th scope="col">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock_outs as $stock_out)
                <tr>
                    <td>{{$stock_out->id}}</td>
                    <td>{{$stock_out->order_number}}</td>
                    <td>{{$stock_out->datetime}}</td>
                    <td>{{$stock_out->customer->user->name}}</td>
                    <td>{{$stock_out->product->name}}</td>
                    <td>{{$stock_out->quantity}}</td>
                    <td>{{$stock_out->notes}}</td>
                    <td>{{$stock_out->total_price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>