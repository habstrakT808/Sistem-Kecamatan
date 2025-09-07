@extends('layouts.admin')

@section('page-title', 'Tambah Data Penduduk')

@section('page-actions')
<a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left me-1"></i>
    Kembali
</a>
@endsection

@section('admin-content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="fas fa-user-plus me-2"></i>
                    Form Tambah Penduduk
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.penduduk.store') }}" method="POST">
                    @csrf
                    
                    <!-- Data Dasar -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                                   id="nik" name="nik" value="{{ old('nik') }}" 
                                   placeholder="16 digit NIK" maxlength="16">
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                   id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" 
                                   placeholder="Nama lengkap sesuai KTP">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="">Pilih...</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                   id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" 
                                   placeholder="Kota/Kabupaten lahir">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                   id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Usia</label>
                            <input type="text" class="form-control" id="usia_display" readonly placeholder="0 tahun">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                            <select class="form-select @error('agama') is-invalid @enderror" id="agama" name="agama">
                                <option value="">Pilih Agama...</option>
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                            @error('agama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="status_perkawinan" class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                            <select class="form-select @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" name="status_perkawinan">
                                <option value="">Pilih Status...</option>
                                <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                            </select>
                            @error('status_perkawinan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <select class="form-select @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir">
                                <option value="">Pilih Pendidikan...</option>
                                <option value="Tidak Sekolah" {{ old('pendidikan_terakhir') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                                <option value="SD" {{ old('pendidikan_terakhir') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('pendidikan_terakhir') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('pendidikan_terakhir') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="D3" {{ old('pendidikan_terakhir') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ old('pendidikan_terakhir') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_terakhir') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_terakhir') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_terakhir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" 
                               id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" 
                               placeholder="Contoh: Petani, Guru, Wiraswasta, dll">
                        @error('pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                  id="alamat" name="alamat" rows="2" 
                                  placeholder="Alamat lengkap tempat tinggal">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="rt" class="form-label">RT <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('rt') is-invalid @enderror" 
                                   id="rt" name="rt" value="{{ old('rt') }}" 
                                   placeholder="001" maxlength="3">
                            @error('rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="rw" class="form-label">RW <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('rw') is-invalid @enderror" 
                                   id="rw" name="rw" value="{{ old('rw') }}" 
                                   placeholder="001" maxlength="3">
                            @error('rw')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="desa_id" class="form-label">Desa <span class="text-danger">*</span></label>
                            <select class="form-select @error('desa_id') is-invalid @enderror" id="desa_id" name="desa_id">
                                <option value="">Pilih Desa...</option>
                                @foreach($desas as $desa)
                                    <option value="{{ $desa->id }}" {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                        {{ $desa->nama_desa }}
                                    </option>
                                @endforeach
                            </select>
                            @error('desa_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Status KTP -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="memiliki_ktp" 
                                       name="memiliki_ktp" value="1" {{ old('memiliki_ktp') ? 'checked' : '' }}>
                                <label class="form-check-label" for="memiliki_ktp">
                                    <strong>Memiliki KTP</strong>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_rekam_ktp" class="form-label">Tanggal Rekam KTP</label>
                            <input type="date" class="form-control @error('tanggal_rekam_ktp') is-invalid @enderror" 
                                   id="tanggal_rekam_ktp" name="tanggal_rekam_ktp" value="{{ old('tanggal_rekam_ktp') }}"
                                   disabled>
                            @error('tanggal_rekam_ktp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary me-md-2">
                            <i class="fas fa-times me-1"></i>
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Info Panel -->
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h6 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Panduan Pengisian
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="fw-bold">Data Wajib:</h6>
                    <ul class="list-unstyled small">
                        <li><i class="fas fa-check text-success me-2"></i>NIK (16 digit)</li>
                        <li><i class="fas fa-check text-success me-2"></i>Nama Lengkap</li>
                        <li><i class="fas fa-check text-success me-2"></i>Jenis Kelamin</li>
                        <li><i class="fas fa-check text-success me-2"></i>Tempat & Tanggal Lahir</li>
                        <li><i class="fas fa-check text-success me-2"></i>Agama</li>
                        <li><i class="fas fa-check text-success me-2"></i>Status Perkawinan</li>
                        <li><i class="fas fa-check text-success me-2"></i>Pekerjaan</li>
                        <li><i class="fas fa-check text-success me-2"></i>Pendidikan Terakhir</li>
                        <li><i class="fas fa-check text-success me-2"></i>Alamat, RT/RW, Desa</li>
                    </ul>
                </div>

                <div class="alert alert-warning">
                    <small>
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Perhatian:</strong> NIK harus unik dan terdiri dari 16 digit angka. Pastikan data sesuai dengan dokumen resmi.
                    </small>
                </div>

                <div class="alert alert-info">
                    <small>
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Tips:</strong> Klasifikasi usia akan otomatis ditentukan berdasarkan tanggal lahir yang diinput.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto calculate age
    const tanggalLahirInput = document.getElementById('tanggal_lahir');
    const usiaDisplay = document.getElementById('usia_display');
    
    tanggalLahirInput.addEventListener('change', function() {
        if (this.value) {
            const birthDate = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            
            usiaDisplay.value = age + ' tahun';
        } else {
            usiaDisplay.value = '';
        }
    });

    // Toggle tanggal rekam KTP
    const memilikiKtpCheckbox = document.getElementById('memiliki_ktp');
    const tanggalRekamKtpInput = document.getElementById('tanggal_rekam_ktp');
    
    memilikiKtpCheckbox.addEventListener('change', function() {
        if (this.checked) {
            tanggalRekamKtpInput.disabled = false;
            tanggalRekamKtpInput.required = true;
        } else {
            tanggalRekamKtpInput.disabled = true;
            tanggalRekamKtpInput.required = false;
            tanggalRekamKtpInput.value = '';
        }
    });

    // Auto format NIK
    const nikInput = document.getElementById('nik');
    nikInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '');
        if (this.value.length > 16) {
            this.value = this.value.slice(0, 16);
        }
    });

    // Auto format RT/RW
    const rtInput = document.getElementById('rt');
    const rwInput = document.getElementById('rw');
    
    [rtInput, rwInput].forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
            if (this.value.length > 3) {
                this.value = this.value.slice(0, 3);
            }
            // Pad with zeros
            if (this.value.length > 0) {
                this.value = this.value.padStart(3, '0');
            }
        });
    });
});
</script>
@endpush