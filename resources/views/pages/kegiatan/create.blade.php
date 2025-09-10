@extends('layouts.app')

@section('title', 'Tambah Kegiatan HME')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kegiatan HME</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('kegiatan.index') }}">Kelola Kegiatan</a></div>
                    <div class="breadcrumb-item">Tambah Kegiatan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Tambah Kegiatan</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kegiatan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="nama_kegiatan" 
                                                   class="form-control @error('nama_kegiatan') is-invalid @enderror" 
                                                   value="{{ old('nama_kegiatan') }}" 
                                                   placeholder="Masukkan nama kegiatan">
                                            @error('nama_kegiatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="deskripsi" 
                                                      class="summernote-simple @error('deskripsi') is-invalid @enderror"
                                                      placeholder="Masukkan deskripsi kegiatan">{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="gambar" id="image-upload" 
                                                       class="@error('gambar') is-invalid @enderror" 
                                                       accept="image/*" />
                                            </div>
                                            <small class="form-text text-muted">
                                                Format: JPG, JPEG, PNG, GIF. Maksimal 2MB.
                                            </small>
                                            @error('gambar')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="kategori" class="form-control select2 @error('kategori') is-invalid @enderror">
                                                <option value="">Pilih Kategori</option>
                                                <option value="Tahunan" {{ old('kategori') == 'Tahunan' ? 'selected' : '' }}>Tahunan</option>
                                                <option value="Divisi" {{ old('kategori') == 'Divisi' ? 'selected' : '' }}>Divisi</option>
                                                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                            @error('kategori')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Kegiatan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="date" name="tanggal_kegiatan" 
                                                   class="form-control @error('tanggal_kegiatan') is-invalid @enderror" 
                                                   value="{{ old('tanggal_kegiatan') }}">
                                            @error('tanggal_kegiatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="status" class="form-control select2 @error('status') is-invalid @enderror">
                                                <option value="">Pilih Status</option>
                                                <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                                                <option value="Published" {{ old('status') == 'Published' ? 'selected' : '' }}>Published</option>
                                            </select>
                                            <small class="form-text text-muted">
                                                Published: Akan ditampilkan di website. Draft: Tidak ditampilkan.
                                            </small>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-md-3"></div>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Simpan Kegiatan
                                            </button>
                                            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left"></i> Kembali
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script>
@endpush
