<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
        
        /* Responsive styles */
        @media (max-width: 991.98px) {
            .info-panel-text {
                padding: 2rem !important;
            }
            .login-form {
                padding: 2rem !important;
            }
            .row.g-0 {
                flex-direction: column-reverse;
            }
            .order-1 {
                order: 1 !important;
            }
            .order-2 {
                order: 2 !important;
            }
        }
        
        @media (max-width: 767.98px) {
            .card-body {
                padding: 0 !important;
            }
            .info-icons .col-4 {
                padding: 0.5rem;
            }
            .info-icons .fs-1 {
                font-size: 1.5rem !important;
            }
            .input-group-text {
                padding: 0.5rem 0.75rem;
            }
            .form-control {
                padding: 0.5rem 0.75rem;
                font-size: 1rem;
            }
            .form-label {
                margin-bottom: 0.25rem;
            }
        }
        
        @media (max-width: 575.98px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .info-panel-text {
                padding: 1.5rem !important;
            }
            .login-form {
                padding: 1.5rem !important;
            }
            h2 {
                font-size: 1.5rem;
            }
            h3 {
                font-size: 1.25rem;
            }
            h4 {
                font-size: 1.2rem;
            }
            .lead {
                font-size: 1rem;
            }
            .display-1 {
                font-size: 3rem !important;
            }
            .btn-lg {
                padding: 0.5rem 1rem;
                font-size: 1rem;
            }
            .alert {
                padding: 0.75rem;
                margin-bottom: 1rem;
                font-size: 0.9rem;
            }
            .card {
                border-radius: 0.75rem !important;
            }
            .form-check-label {
                font-size: 0.9rem;
            }
        }
        
        /* Extra small devices */
        @media (max-width: 359.98px) {
            .info-panel-text {
                padding: 1rem !important;
            }
            .login-form {
                padding: 1rem !important;
            }
            .display-1 {
                font-size: 2.5rem !important;
            }
            .info-icons .col-4 {
                padding: 0.25rem;
            }
            .info-icons .fs-1 {
                font-size: 1.25rem !important;
            }
            .info-icons small {
                font-size: 0.7rem;
            }
        }
    </style>
</head>
<body class="bg-gradient-primary min-vh-100 d-flex align-items-center py-3 py-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card border-0 shadow-custom rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <!-- Left Side - Info Panel -->
                            <div class="col-lg-6 bg-gradient-primary text-white d-flex align-items-center order-2 order-lg-1">
                                <div class="p-5 text-center w-100 info-panel-text">
                                    <div class="mb-4">
                                        <i class="fas fa-building display-1 mb-3"></i>
                                        <h2 class="fw-bold mb-2">Sistem Informasi</h2>
                                        <h3 class="fw-bold">Kecamatan Belitang Jaya</h3>
                                    </div>
                                    <p class="lead mb-4">
                                        Sistem terpadu untuk mengelola data desa, penduduk, perangkat desa, dan aset di wilayah Kecamatan Belitang Jaya
                                    </p>
                                    <div class="row text-center info-icons">
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
                            <div class="col-lg-6 order-1 order-lg-2">
                                <div class="p-5 login-form">
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
                                            <div class="input-group flex-nowrap">
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
                                            <div class="input-group flex-nowrap">
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

                                    <!-- Demo Accounts Info telah dihapus -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script untuk meningkatkan pengalaman pengguna pada perangkat mobile
        document.addEventListener('DOMContentLoaded', function() {
            // Meningkatkan area sentuh untuk elemen interaktif pada perangkat mobile
            if (window.innerWidth < 768) {
                // Menambahkan padding pada elemen form untuk meningkatkan area sentuh
                document.querySelectorAll('.form-control, .btn, .input-group-text').forEach(function(el) {
                    el.style.touchAction = 'manipulation';
                });
                
                // Fokus otomatis pada field email saat halaman dimuat
                setTimeout(function() {
                    const emailField = document.getElementById('email');
                    if (emailField) {
                        emailField.focus();
                    }
                }, 500);
            }
            
            // Menambahkan validasi form sederhana
            const loginForm = document.querySelector('form');
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    const emailField = document.getElementById('email');
                    const passwordField = document.getElementById('password');
                    let isValid = true;
                    
                    // Validasi email
                    if (!emailField.value.trim() || !emailField.value.includes('@')) {
                        emailField.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        emailField.classList.remove('is-invalid');
                    }
                    
                    // Validasi password
                    if (!passwordField.value.trim() || passwordField.value.length < 6) {
                        passwordField.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        passwordField.classList.remove('is-invalid');
                    }
                    
                    // Jika tidak valid, mencegah pengiriman form
                    if (!isValid) {
                        e.preventDefault();
                    }
                });
            }
        });
    </script>
</body>
</html>