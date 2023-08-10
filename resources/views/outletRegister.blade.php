@extends('layout.template')

@section('body')
<div class="outletRegisterPanel">
    <h2>Tambah Outlet</h2>
    <form method="POST" action="">
        {{ csrf_field() }}
        <label for="outlet_name">Nama Outlet</label>
        <input type="text" name="outlet_name" id="outlet_name"><br>
        <label for="outlet_phone_number">No. Telepon Outlet</label>
        <input type="text" name="outlet_phone_number" id="outlet_phone_number"><br>
        <label for="outlet_address">Alamat Outlet</label>
        <input type="text" name="outlet_address" id="outlet_address"><br>
        <input type="submit" value="Register Outlet" class="loginBtn">
    </form>
</div>
@endsection