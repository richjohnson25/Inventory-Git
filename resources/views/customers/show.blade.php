@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Customer</h1>
        <form action="{{ route('customer_search') }}" class="search-form form-holder" method="GET">
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
                @foreach($customers as $cus)
                <tr>
                    <td>{{$cus->id}}</td>
                    <td>{{$cus->customer_code}}</td>
                    <td>{{$cus->name}}</td>
                    <td>{{$cus->email}}</td>
                    <td>{{$cus->phone_number}}</td>
                    <td>{{$cus->ktp}}</td>
                    <td>{{$cus->npwp}}</td>
                    <td><button class="btn btn-info">Contact</a></td>
                    <form action="/customers/{{ $cus->id }}" method="POST">
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