@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-gradient-primary sidebar collapse">
            <div class="position-sticky pt-3">
                <!-- User Info -->
                <div class="text-center mb-4 px-3">
                    <div class="bg-white bg-opacity-10 rounded-3 p-3 mb-3">
                        <i class="fas fa-user-circle display-6 text-white mb-2"></i>
                        <h6 class="text-white fw-bold mb-1">Admin Kecamatan</h6>
                        <small class="text-white-50">{{ Auth::user()->name }}</small>
                    </div>
                </div>
                
                <!-- Navigation Menu -->
                <ul class="nav flex-column px-2">
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.dashboard') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.monitoring') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.monitoring') }}">
                            <i class="fas fa-map-marked-alt me-2"></i>
                            Monitoring Desa
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.desa.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.desa.index') }}">
                            <i class="fas fa-home me-2"></i>
                            Data Desa
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.perangkat-desa.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.perangkat-desa.index') }}">
                            <i class="fas fa-users me-2"></i>
                            Perangkat Desa
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.penduduk.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.penduduk.index') }}">
                            <i class="fas fa-user-friends me-2"></i>
                            Data Penduduk
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.aset-desa.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.aset-desa.index') }}">
                            <i class="fas fa-building me-2"></i>
                            Aset Desa
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.aset-tanah-warga.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.aset-tanah-warga.index') }}">
                            <i class="fas fa-map me-2"></i>
                            Aset Tanah Warga
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.statistik') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.statistik') }}">
                            <i class="fas fa-chart-bar me-2"></i>
                            Statistik Detail
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.dokumen.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.dokumen.index') }}">
                            <i class="fas fa-folder me-2"></i>
                            Dokumen & Bantuan
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin.users.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin.users.index') }}">
                            <i class="fas fa-user-cog me-2"></i>
                            Manajemen User
                        </a>
                    </li>
                    
                    <li class="nav-item mt-4">
                        <hr class="text-white-50">
                        <a class="nav-link text-white sidebar-link rounded-2 text-danger" 
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Header -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-dark fw-bold">@yield('page-title', 'Dashboard')</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    @yield('page-actions')
                </div>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2 list-unstyled">
                        @foreach($errors->all() as $error)
                            <li><i class="fas fa-dot-circle me-2 small"></i>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Loading Indicator -->
            <div class="loading d-none text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2 text-muted">Memuat data...</p>
            </div>

            <!-- Page Content -->
            <div class="fade-in">
                @yield('admin-content')
            </div>
        </main>
    </div>
</div>
@endsection