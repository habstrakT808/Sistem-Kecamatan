@extends('layouts.admin-desa')

@section('page-title')
    Penduduk
@endsection

@section('page-actions')
    <a href="{{ route('admin-desa.penduduk.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('admin-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm bg-white">
                <div class="card-header bg-white border-0">
                    <h5 class="card-title mb-0"><i class="fas fa-user-edit me-1"></i> Form Edit Penduduk</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-desa.penduduk.update', $penduduk->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nik" class="form-label fw-bold">NIK <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $penduduk->nik) }}" required maxlength="16" placeholder="Nomor Induk Kependudukan">
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted"><i class="fas fa-info-circle me-1"></i> NIK harus 16 digit angka</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_lengkap" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $penduduk->nama_lengkap) }}" required placeholder="Nama lengkap penduduk">
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="P" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tempat_lahir" class="form-label fw-bold">Tempat Lahir <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" required placeholder="Tempat lahir">
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tanggal_lahir" class="form-label fw-bold">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir->format('Y-m-d')) }}" required>
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="agama" class="form-label fw-bold">Agama <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-pray"></i></span>
                                        <select class="form-select @error('agama') is-invalid @enderror" id="agama" name="agama" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam" {{ old('agama', $penduduk->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Kristen" {{ old('agama', $penduduk->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                            <option value="Katolik" {{ old('agama', $penduduk->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                            <option value="Hindu" {{ old('agama', $penduduk->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ old('agama', $penduduk->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu" {{ old('agama', $penduduk->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                    @error('agama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="status_perkawinan" class="form-label fw-bold">Status Perkawinan <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-ring"></i></span>
                                        <select class="form-select @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan" name="status_perkawinan" required>
                                            <option value="">Pilih Status Perkawinan</option>
                                            <option value="Belum Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                            <option value="Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                            <option value="Cerai Hidup" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                            <option value="Cerai Mati" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                        </select>
                                        @error('status_perkawinan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="pendidikan_terakhir" class="form-label fw-bold">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                        <select class="form-select @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                            <option value="Tidak Sekolah" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                                            <option value="SD" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SD' ? 'selected' : '' }}>SD</option>
                                            <option value="SMP" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                            <option value="SMA" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                            <option value="D3" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'D3' ? 'selected' : '' }}>D3</option>
                                            <option value="S1" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'S2' ? 'selected' : '' }}>S2</option>
                                            <option value="S3" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'S3' ? 'selected' : '' }}>S3</option>
                                        </select>
                                        @error('pendidikan_terakhir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="pekerjaan" class="form-label fw-bold">Pekerjaan <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}" required placeholder="Pekerjaan">
                                        @error('pekerjaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="alamat" class="form-label fw-bold">Alamat <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required placeholder="Alamat lengkap">{{ old('alamat', $penduduk->alamat) }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="rt" class="form-label fw-bold">RT <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-signs"></i></span>
                                        <input type="text" class="form-control @error('rt') is-invalid @enderror" id="rt" name="rt" value="{{ old('rt', $penduduk->rt) }}" required maxlength="3" placeholder="RT">
                                    @error('rt')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="rw" class="form-label fw-bold">RW <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-map-signs"></i></span>
                                        <input type="text" class="form-control @error('rw') is-invalid @enderror" id="rw" name="rw" value="{{ old('rw', $penduduk->rw) }}" required maxlength="3" placeholder="RW">
                                        @error('rw')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="memiliki_ktp" name="memiliki_ktp" value="1" {{ old('memiliki_ktp', $penduduk->memiliki_ktp) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="memiliki_ktp">
                                            <i class="fas fa-id-card me-1"></i> Memiliki KTP
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tanggal_rekam_ktp" class="form-label fw-bold">Tanggal Rekam KTP</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date" class="form-control @error('tanggal_rekam_ktp') is-invalid @enderror" id="tanggal_rekam_ktp" name="tanggal_rekam_ktp" value="{{ old('tanggal_rekam_ktp', $penduduk->tanggal_rekam_ktp ? $penduduk->tanggal_rekam_ktp->format('Y-m-d') : '') }}">
                                        @error('tanggal_rekam_ktp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">Wajib diisi jika memiliki KTP</small>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-4">
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('admin-desa.penduduk.index') }}" class="btn btn-secondary ms-2">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Script untuk menampilkan/menyembunyikan tanggal rekam KTP
    $(document).ready(function() {
        function toggleTanggalRekamKTP() {
            if ($('#memiliki_ktp').is(':checked')) {
                $('#tanggal_rekam_ktp').prop('required', true);
                $('#tanggal_rekam_ktp').closest('.form-group').show();
            } else {
                $('#tanggal_rekam_ktp').prop('required', false);
                $('#tanggal_rekam_ktp').val('');
                $('#tanggal_rekam_ktp').closest('.form-group').hide();
            }
        }

        // Jalankan saat halaman dimuat
        toggleTanggalRekamKTP();

        // Jalankan saat checkbox berubah
        $('#memiliki_ktp').change(function() {
            toggleTanggalRekamKTP();
        });
    });
</script>
@endpush