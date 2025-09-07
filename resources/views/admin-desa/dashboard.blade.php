@extends('layouts.admin')

@section('page-title', 'Dashboard Admin Desa')

@section('admin-content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-info">
            <h4>Selamat Datang, {{ auth()->user()->name }}!</h4>
            <p>Anda login sebagai Admin Desa <strong>{{ $desa->nama_desa }}</strong></p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h3>{{ $totalPenduduk }}</h3>
                <p>Total Penduduk</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h3>{{ $totalPerangkat }}</h3>
                <p>Total Perangkat</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h3>{{ $totalAset }}</h3>
                <p>Total Aset</p>
            </div>
        </div>
    </div>
</div>
@endsection