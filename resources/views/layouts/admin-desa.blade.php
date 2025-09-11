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
                        <h6 class="text-white fw-bold mb-1">Admin Desa</h6>
                        <small class="text-white-50">{{ Auth::user()->name }}</small>
                        @if(Auth::user()->desa)
                            <div class="mt-1 badge bg-light text-primary">{{ Auth::user()->desa->nama_desa }}</div>
                        @endif
                    </div>
                </div>
                
                <!-- Navigation Menu -->
                <ul class="nav flex-column px-2">
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin-desa.dashboard') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin-desa.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin-desa.desa.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin-desa.desa.index') }}">
                            <i class="fas fa-home me-2"></i>
                            Data Desa
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin-desa.penduduk.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin-desa.penduduk.index') }}">
                            <i class="fas fa-users me-2"></i>
                            Data Penduduk
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin-desa.perangkat-desa.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin-desa.perangkat-desa.index') }}">
                            <i class="fas fa-user-tie me-2"></i>
                            Perangkat Desa
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin-desa.aset-desa.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin-desa.aset-desa.index') }}">
                            <i class="fas fa-building me-2"></i>
                            Aset Desa
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin-desa.aset-tanah-warga.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin-desa.aset-tanah-warga.index') }}">
                            <i class="fas fa-home me-2"></i>
                            Aset Tanah Warga
                        </a>
                    </li>
                    
                    <li class="nav-item mb-1">
                        <a class="nav-link sidebar-link rounded-2 {{ request()->routeIs('admin-desa.dokumen.*') ? 'bg-white text-primary fw-bold' : 'text-white' }}" 
                           href="{{ route('admin-desa.dokumen.index') }}">
                            <i class="fas fa-folder me-2"></i>
                            Dokumen & Bantuan
                        </a>
                    </li>
                    
                    <li class="nav-item mt-4">
                        <hr class="text-white-50">
                        <form action="{{ route('logout') }}" method="POST" class="d-grid px-2">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4">
            <!-- Page Header -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('page-title', 'Dashboard')</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    @yield('page-actions')
                </div>
            </div>
            
            <!-- Alert Messages -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            <!-- Loading Indicator -->
            <div id="loading-indicator" class="text-center d-none">
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