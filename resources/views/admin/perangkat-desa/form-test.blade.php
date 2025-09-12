@extends('layouts.admin')

@section('page-title', 'Test Form Edit Perangkat Desa')

@section('admin-content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5 class="card-title mb-0">
                    <i class="fas fa-user-edit me-2"></i>
                    Form Test Edit Perangkat Desa
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.perangkat-desa.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle me-2"></i>Alasan Perubahan</h6>
                        <textarea class="form-control" name="update_reason" rows="2" required>Test update reason</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="Test Name">
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="Test Position">
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-warning" id="submit-btn">
                            <i class="fas fa-save me-1"></i>
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitBtn = document.getElementById('submit-btn');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Form submitted');
        alert('Form submitted');
        
        // Uncomment to actually submit the form
        // this.submit();
    });
    
    submitBtn.addEventListener('click', function(e) {
        console.log('Submit button clicked');
        alert('Submit button clicked');
    });
});
</script>
@endpush