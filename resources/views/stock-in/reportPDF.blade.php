<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
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
                @foreach($stock_ins as $stock_in)
                <tr>
                    <td>{{$stock_in->id}}</td>
                    <td>{{$stock_in->order_number}}</td>
                    <td>{{$stock_in->datetime}}</td>
                    <td>{{$stock_in->product->name}}</td>
                    <td>{{$stock_in->quantity}}</td>
                    <td>{{$stock_in->price}}</td>
                    <td>{{$stock_in->total_price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>