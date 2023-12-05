@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="main">
        <h1 class="title">Tambah Customer</h1>
        <form class="row g-3" action="{{ route('storeCustomer') }}" method="POST">
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
            <div class="col-md-12" id="customer_code">
                <label for="customer_code" class="form-label">Kuantitas</label>
                <input type="text" class="form-control" id="customer_code" name="customer_code">

                @error('customer_code')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <button id="add-customer" class="btn btn-primary" type="submit">Tambah Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection