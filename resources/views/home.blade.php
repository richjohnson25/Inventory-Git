@extends('layout.template')

@section('body')
<div class="main-bg">
    <div class="homeBanner">
        <div class="homeTitle">
            <h1>Tingkatkan produktivitas perusahaan Anda</h1>
            <h5>Atur sistem gudang dengan aplikasi inventaris</h5>
        </div>
        <div class="rightImage">
            <img src="https://kledo.com/blog/wp-content/uploads/2022/05/inventaris.png" alt="Home Banner Image">
        </div>
    </div>
    <div class="featurePanel">
        <h3>Fitur Kami</h3>
        <div class="feature-layout">
            <div class="feature-container">
                <h6>Manage Supplier & Customer</h6>
                <img src="https://cdn-icons-png.flaticon.com/512/839/839872.png" style="width:100px;height:100px;">
                Kelola informasi yang berkaitan dengan supplier & customer
            </div>
            <div class="feature-container">
                <h6>Export & Print Stock Management Data</h6>
                <img src="https://cdn-icons-png.flaticon.com/512/5412/5412791.png" style="width:100px;height:100px;">
                Export data inventory baik dalam bentuk PDF & Excel maupun Print
            </div>
            <div class="feature-container"></div>
            <div class="feature-container"></div>
        </div>
    </div>
</div>
@endsection