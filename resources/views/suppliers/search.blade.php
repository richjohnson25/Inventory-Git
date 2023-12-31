@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Supplier</h1>
        <form action="{{ route('supplier_search') }}" class="search-form form-holder" method="GET">
            <input type="text" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">No. KTP</th>
                    <th scope="col">No. NPWP</th>
                    <th colspan="2" scope="colgroup">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($suppliers as $sup)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$sup->supplier_code}}</td>
                    <td>{{$sup->user->name}}</td>
                    <td>{{$sup->user->email}}</td>
                    <td>{{$sup->user->phone_number}}</td>
                    <td>{{$sup->user->ktp}}</td>
                    <td>{{$sup->user->npwp}}</td>
                    <td><button class="btn btn-info">Contact</a></td>
                    <form action="/suppliers/{{ $sup->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <td><button type="submit" class="btn btn-danger">Delete</button></td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection