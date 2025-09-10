@extends('layouts.app')

@section('title', 'Kelola Kegiatan HME')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kelola Kegiatan HME</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Kelola Kegiatan</div>
                </div>
            </div>

            <div class="section-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Kegiatan Himpunan Mahasiswa Elektro</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Tambah Kegiatan
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Kategori</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($kegiatan as $index => $item)
                                                <tr>
                                                    <td>{{ $kegiatan->firstItem() + $index }}</td>
                                                    <td>
                                                        @if ($item->gambar)
                                                            <img src="{{ asset('storage/' . $item->gambar) }}" 
                                                                 alt="{{ $item->nama_kegiatan }}" 
                                                                 class="img-thumbnail"
                                                                 style="width: 80px; height: 60px; object-fit: cover;">
                                                        @else
                                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                                 style="width: 80px; height: 60px;">
                                                                <i class="fas fa-image text-muted"></i>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <strong>{{ $item->nama_kegiatan }}</strong>
                                                        <br>
                                                        <small class="text-muted">{{ Str::limit($item->deskripsi, 50) }}</small>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-{{ $item->kategori == 'Tahunan' ? 'primary' : ($item->kategori == 'Divisi' ? 'info' : 'secondary') }}">
                                                            {{ $item->kategori }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $item->tanggal_kegiatan->format('d M Y') }}</td>
                                                    <td>
                                                        <span class="badge badge-{{ $item->status == 'Published' ? 'success' : 'warning' }}">
                                                            {{ $item->status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{ route('kegiatan.show', $item) }}" 
                                                               class="btn btn-info btn-sm">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('kegiatan.edit', $item) }}" 
                                                               class="btn btn-warning btn-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button type="button" class="btn btn-danger btn-sm" 
                                                                    onclick="confirmDelete({{ $item->id }})">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                        
                                                        <form id="delete-form-{{ $item->id }}" 
                                                              action="{{ route('kegiatan.destroy', $item) }}" 
                                                              method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        <div class="py-4">
                                                            <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                                                            <h5 class="text-muted">Belum ada kegiatan</h5>
                                                            <p class="text-muted">Silakan tambahkan kegiatan HME yang akan ditampilkan di website</p>
                                                            <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">
                                                                <i class="fas fa-plus"></i> Tambah Kegiatan Pertama
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                
                                @if ($kegiatan->hasPages())
                                    <div class="d-flex justify-content-center">
                                        {{ $kegiatan->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    
    <script>
        function confirmDelete(id) {
            swal({
                title: 'Hapus Kegiatan?',
                text: 'Data kegiatan akan dihapus secara permanen!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endpush
