<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Kecamatan Belitang Jaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Minimal custom CSS - hanya untuk gradient background dan shadow effects */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }
        .shadow-custom {
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
        }
        .btn-gradient {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
        }
        .btn-gradient:hover {
            background: linear-gradient(45deg, #5a6fd8, #6a4190);
        }
    </style>
</head>
<body class="bg-gradient-primary min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card border-0 shadow-custom rounded-4">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <!-- Left Side - Info Panel -->
                            <div class="col-lg-6 bg-gradient-primary text-white d-flex align-items-center">
                                <div class="p-5 text-center w-100">
                                    <div class="mb-4">
                                        <i class="fas fa-building display-1 mb-3"></i>
                                        <h2 class="fw-bold mb-2">Sistem Informasi</h2>
                                        <h3 class="fw-bold">Kecamatan Belitang Jaya</h3>
                                    </div>
                                    <p class="lead mb-4">
                                        Sistem terpadu untuk mengelola data desa, penduduk, perangkat desa, dan aset di wilayah Kecamatan Belitang Jaya
                                    </p>
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <i class="fas fa-home fs-1 mb-2 d-block"></i>
                                            <small>Data Desa</small>
                                        </div>
                                        <div class="col-4">
                                            <i class="fas fa-users fs-1 mb-2 d-block"></i>
                                            <small>Data Penduduk</small>
                                        </div>
                                        <div class="col-4">
                                            <i class="fas fa-chart-bar fs-1 mb-2 d-block"></i>
                                            <small>Statistik</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Right Side - Login Form -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center mb-4">
                                        <h4 class="fw-bold text-dark">Masuk ke Sistem</h4>
                                        <p class="text-muted">Silakan masukkan email dan password Anda</p>
                                    </div>

                                    <!-- Flash Messages -->
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        
                                        <!-- Email Field -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label fw-semibold">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-envelope text-muted"></i>
                                                </span>
                                                <input type="email" 
                                                       class="form-control @error('email') is-invalid @enderror" 
                                                       id="email" 
                                                       name="email" 
                                                       value="{{ old('email') }}" 
                                                       placeholder="Masukkan email Anda"
                                                       required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Password Field -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label fw-semibold">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light">
                                                    <i class="fas fa-lock text-muted"></i>
                                                </span>
                                                <input type="password" 
                                                       class="form-control @error('password') is-invalid @enderror" 
                                                       id="password" 
                                                       name="password" 
                                                       placeholder="Masukkan password Anda"
                                                       required>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                                <label class="form-check-label" for="remember">
                                                    Ingat saya
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-gradient btn-lg py-3">
                                                <i class="fas fa-sign-in-alt me-2"></i>
                                                Masuk
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Demo Accounts Info -->
                                    <div class="mt-4">
                                        <div class="card bg-light">
                                            <div class="card-body p-3">
                                                <h6 class="card-title mb-2">
                                                    <i class="fas fa-info-circle me-2"></i>
                                                    Demo Account
                                                </h6>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <small class="text-muted d-block">
                                                            <strong>Admin Kecamatan:</strong><br>
                                                            <code>admin@kecamatan.com</code> / <code>password123</code>
                                                        </small>
                                                        <small class="text-muted d-block mt-2">
                                                            <strong>Admin Desa:</strong><br>
                                                            <code>admin.desa1@desa.com</code> / <code>password123</code>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>