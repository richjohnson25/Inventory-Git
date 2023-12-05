@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Tambah Supplier</h1>
        <form class="row g-3" action="{{ route('storeSupplier') }}" method="POST">
            @csrf
            <div class="col-md-12" id="user_name">
                <label for="user_name" class="form-label">Supplier</label>
                <select id="user_name" name="user_id" class="form-select">
                    <option selected value="">Choose...</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{$user->name}}</option>
                    @endforeach
                </select>

                @error('user_name')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-12" id="supplier_code">
                <label for="supplier_code" class="form-label">Kuantitas</label>
                <input type="text" class="form-control" id="supplier_code" name="supplier_code">

                @error('supplier_code')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <button id="add-supplier" class="btn btn-primary" type="submit">Tambah Supplier</button>
            </div>
        </form>
    </div>
</div>
@endsection