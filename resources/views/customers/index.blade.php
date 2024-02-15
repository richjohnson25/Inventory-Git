@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Customer</h1>
        <form action="{{ route('customer_search') }}" class="search-form form-holder" method="GET">
            <input type="text" name="customer_search" placeholder="Search">
            <button type="submit" class="searchBtn">Search</button>
        </form>
        <div class="addButton">
            <a href="/customers/create">Tambah Customer</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Telepon</th>
                    <th colspan="3" scope="colgroup">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $cus)
                <tr>
                    <td>{{$cus->id}}</td>
                    <td>{{$cus->code}}</td>
                    <td>{{$cus->name}}</td>
                    <td>{{$cus->phone_number}}</td>
                    <td><button class="btn btn-success">Contact</button>
                    <a href="{{ route('viewCustomer', $cus->id) }}" class="btn btn-info">View</a></td>
                    @if($role=='admin')
                    <td><a href="{{ route('editCustomer', $cus->id) }}" class="btn btn-info">Edit</a></td>
                    <td>
                        <form action="{{ route('deleteCustomer', $cus->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
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