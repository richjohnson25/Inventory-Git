@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Customer</h1>
        <form action="{{ route('customer_search') }}" class="search-form form-holder" method="GET">
            <input type="text" name="search" placeholder="Search">
            <button type="submit" class="searchBtn">Search</button>
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
                    <td>{{$cus->user->name}}</td>
                    <td>{{$cus->user->email}}</td>
                    <td>{{$cus->user->phone_number}}</td>
                    <td>{{$cus->user->ktp}}</td>
                    <td>{{$cus->user->npwp}}</td>
                    <td><button class="btn btn-info">Contact</button></td>
                    @if($role=='admin')
                    <form action="/customers/{{ $cus->id }}" method="POST">
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