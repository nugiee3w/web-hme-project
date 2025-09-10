@extends('layouts.app')

@section('title', 'Detail Kegiatan HME')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Kegiatan HME</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('kegiatan.index') }}">Kelola Kegiatan</a></div>
                    <div class="breadcrumb-item">Detail Kegiatan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $kegiatan->nama_kegiatan }}</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('kegiatan.edit', $kegiatan) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Nama Kegiatan:</label>
                                            <p class="form-control-plaintext">{{ $kegiatan->nama_kegiatan }}</p>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Deskripsi:</label>
                                            <div class="form-control-plaintext border rounded p-3" style="min-height: 150px;">
                                                {!! $kegiatan->deskripsi !!}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label font-weight-bold">Kategori:</label>
                                                    <p class="form-control-plaintext">
                                                        <span class="badge badge-{{ $kegiatan->kategori == 'Tahunan' ? 'primary' : ($kegiatan->kategori == 'Divisi' ? 'info' : 'secondary') }} badge-lg">
                                                            {{ $kegiatan->kategori }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label font-weight-bold">Status:</label>
                                                    <p class="form-control-plaintext">
                                                        <span class="badge badge-{{ $kegiatan->status == 'Published' ? 'success' : 'warning' }} badge-lg">
                                                            {{ $kegiatan->status }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Tanggal Kegiatan:</label>
                                            <p class="form-control-plaintext">
                                                <i class="fas fa-calendar-alt text-primary"></i> 
                                                {{ $kegiatan->tanggal_kegiatan->format('d F Y') }}
                                            </p>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label font-weight-bold">Dibuat:</label>
                                                    <p class="form-control-plaintext text-muted">
                                                        <i class="fas fa-clock"></i> 
                                                        {{ $kegiatan->created_at->format('d M Y, H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label font-weight-bold">Terakhir Diupdate:</label>
                                                    <p class="form-control-plaintext text-muted">
                                                        <i class="fas fa-edit"></i> 
                                                        {{ $kegiatan->updated_at->format('d M Y, H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Gambar Kegiatan:</label>
                                            @if($kegiatan->gambar)
                                                <div class="text-center">
                                                    <img src="{{ asset('storage/' . $kegiatan->gambar) }}" 
                                                         alt="{{ $kegiatan->nama_kegiatan }}" 
                                                         class="img-fluid rounded shadow"
                                                         style="max-width: 100%; max-height: 400px; object-fit: cover;">
                                                </div>
                                            @else
                                                <div class="text-center border rounded p-5 bg-light">
                                                    <i class="fas fa-image fa-4x text-muted mb-3"></i>
                                                    <p class="text-muted">Tidak ada gambar</p>
                                                </div>
                                            @endif
                                        </div>

                                        @if($kegiatan->status == 'Published')
                                            <div class="alert alert-success">
                                                <div class="alert-title">Kegiatan Dipublikasi</div>
                                                Kegiatan ini akan tampil di website HME pada bagian portfolio/kegiatan.
                                            </div>
                                        @else
                                            <div class="alert alert-warning">
                                                <div class="alert-title">Status Draft</div>
                                                Kegiatan ini belum dipublikasi dan tidak akan tampil di website.
                                            </div>
                                        @endif
                                    </div>
                                </div>
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
@endpush
