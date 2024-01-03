@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Daftar Kategori Barang</h1>
        <form action="{{ route('category_search') }}" class="search-form form-holder" method="GET">
            <input type="text" name="search" placeholder="Search">
            <button type="submit" class="searchBtn">Search</button>
        </form>
        <div class="addButton">
            <a href="/categories/create">Tambah Kategori Barang</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($categories as $category)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$category->name}}</td>
                    @if($role=='admin')
                    <form action="/categories/{{ $category->id }}" method="POST">
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