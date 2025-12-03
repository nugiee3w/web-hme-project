<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Kegiatan</h2>
            <p>Beberapa kegiatan yang diselenggarakan oleh Himpunan Mahasiswa Elektro.</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up"
            data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-tahunan">Tahunan</li>
            <li data-filter=".filter-divisi">Divisi</li>
            <li data-filter=".filter-lainnya">Lainnya</li>
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @php
                $kegiatan = \App\Models\Kegiatan::published()->orderBy('tanggal_kegiatan', 'desc')->get();
            @endphp

            @forelse($kegiatan as $item)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ strtolower($item->kategori) }}">
                    <a href="{{ route('kegiatan.detail', $item->id) }}" class="text-decoration-none text-dark">
                        @if($item->gambar)
                            <div class="portfolio-img">
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->nama_kegiatan }}">
                                <div class="portfolio-overlay">
                                    <div class="portfolio-overlay-content">
                                        <i class="bx bx-show"></i>
                                        <span>Lihat Detail</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="portfolio-img">
                                <img src="{{ asset('assets/img/portfolio/Coming.PNG') }}" class="img-fluid" alt="{{ $item->nama_kegiatan }}">
                                <div class="portfolio-overlay">
                                    <div class="portfolio-overlay-content">
                                        <i class="bx bx-show"></i>
                                        <span>Lihat Detail</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="portfolio-info">
                            <h4>{{ $item->nama_kegiatan }}</h4>
                            <p class="text-muted">{{ $item->tanggal_kegiatan->format('d F Y') }}</p>
                            @if(strlen(strip_tags($item->deskripsi)) > 100)
                                <p class="small">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                            @endif
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada kegiatan yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>
