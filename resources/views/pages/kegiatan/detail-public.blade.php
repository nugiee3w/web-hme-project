<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $kegiatan->nama_kegiatan }} - HME Poliban</title>
    <meta content="Detail kegiatan {{ $kegiatan->nama_kegiatan }} yang diselenggarakan oleh Himpunan Mahasiswa Elektro Politeknik Negeri Banjarmasin" name="description">
    <meta content="HME, Poliban, {{ $kegiatan->nama_kegiatan }}, Elektro" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/hme.png') }}" rel="icon">
    <link href="{{ asset('assets/img/hme.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        .detail-header {
            background: linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url('{{ asset('assets/img/hero-bg.png') }}');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 120px 0 60px 0;
            color: white;
        }
        
        .detail-content {
            padding: 60px 0;
        }
        
        .kegiatan-image {
            border-radius: 10px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            width: 100%;
            height: 400px;
            object-fit: cover;
            object-position: center;
        }
        
        .kegiatan-meta {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .meta-item:last-child {
            margin-bottom: 0;
        }
        
        .meta-item i {
            width: 20px;
            margin-right: 10px;
            color: #47b2e4;
        }
        
        .back-btn {
            margin-bottom: 30px;
        }
        
        .kategori-badge {
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            font-weight: 600;
        }
        
        .kategori-tahunan {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .kategori-divisi {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }
        
        .kategori-lainnya {
            background-color: #e8f5e8;
            color: #388e3c;
        }
        
        .related-kegiatan-img {
            height: 200px;
            object-fit: cover;
            object-position: center;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .kegiatan-image {
                height: 300px;
            }
            
            .detail-header {
                padding: 100px 0 40px 0;
            }
            
            .detail-content {
                padding: 40px 0;
            }
        }
        
        @media (max-width: 576px) {
            .kegiatan-image {
                height: 250px;
            }
            
            .related-kegiatan-img {
                height: 180px;
            }
        }
        
        /* Logo styling */
        .logo a {
            text-decoration: none !important;
            transition: all 0.3s ease;
        }
        
        .logo a:hover {
            opacity: 0.8;
        }
        
        .logo img {
            transition: all 0.3s ease;
        }
        
        .logo a:hover img {
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
    
            <h1 class="logo me-auto"><a href="{{ url('/') }}">HME POLIBAN</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="{{ url('/') }}" class="logo me-auto"><img src="{{ asset('assets/img/hme.png') }}" alt="" class="img-fluid"></a>-->
    
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link" href="{{ url('/') }}#hero">Beranda</a></li>
                    <li><a class="nav-link" href="{{ url('/') }}#about">Tentang Kami</a></li>
                    <li><a class="nav-link" href="{{ url('/') }}#Strukturorganisasi">Struktur organisasi</a></li>
                    <li><a class="nav-link" href="{{ url('/') }}#team">Divisi</a></li>
                    <li><a class="nav-link scrollto active" href="{{ url('/') }}#portfolio">Kegiatan</a></li>
                    <li><a class="nav-link" href="{{ url('/') }}#mdprt">Media Partner</a></li>
                    {{-- <li><a class="nav-link" href="{{ url('/') }}#oprc">Open Recruitment</a></li> --}}
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header>

    <!-- ======= Detail Header ======= -->
    <section class="detail-header">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8">
                    <span class="kategori-badge kategori-{{ strtolower($kegiatan->kategori) }}">
                        {{ $kegiatan->kategori }}
                    </span>
                    <h1 class="mt-3">{{ $kegiatan->nama_kegiatan }}</h1>
                    <p class="lead">{{ $kegiatan->tanggal_kegiatan->format('d F Y') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Detail Content ======= -->
    <section class="detail-content">
        <div class="container" data-aos="fade-up">
            <div class="back-btn">
                <a href="{{ url('/') }}#portfolio" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Kegiatan
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    @if($kegiatan->gambar)
                        <img src="{{ asset('storage/' . $kegiatan->gambar) }}" 
                             alt="{{ $kegiatan->nama_kegiatan }}" 
                             class="img-fluid kegiatan-image">
                    @else
                        <img src="{{ asset('assets/img/portfolio/Coming.PNG') }}" 
                             alt="{{ $kegiatan->nama_kegiatan }}" 
                             class="img-fluid kegiatan-image">
                    @endif

                    <div class="content mt-4">
                        <h3>Deskripsi Kegiatan</h3>
                        <div class="kegiatan-description">
                            {!! $kegiatan->deskripsi !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="kegiatan-meta">
                        <h5>Informasi Kegiatan</h5>
                        
                        <div class="meta-item">
                            <i class="bi bi-calendar-event"></i>
                            <div>
                                <strong>Tanggal:</strong><br>
                                {{ $kegiatan->tanggal_kegiatan->format('d F Y') }}
                            </div>
                        </div>

                        <div class="meta-item">
                            <i class="bi bi-tag"></i>
                            <div>
                                <strong>Kategori:</strong><br>
                                <span class="kategori-badge kategori-{{ strtolower($kegiatan->kategori) }}">
                                    {{ $kegiatan->kategori }}
                                </span>
                            </div>
                        </div>

                        <div class="meta-item">
                            <i class="bi bi-building"></i>
                            <div>
                                <strong>Penyelenggara:</strong><br>
                                Himpunan Mahasiswa Elektro<br>
                                Politeknik Negeri Banjarmasin
                            </div>
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="kegiatan-meta">
                        <h6>Bagikan Kegiatan</h6>
                        <div class="social-share">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($kegiatan->nama_kegiatan) }}" 
                               target="_blank" class="btn btn-outline-info btn-sm me-2">
                                <i class="bi bi-twitter"></i> Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($kegiatan->nama_kegiatan . ' - ' . request()->fullUrl()) }}" 
                               target="_blank" class="btn btn-outline-success btn-sm">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Activities -->
            <div class="row mt-5">
                <div class="col-12">
                    <h4>Kegiatan Lainnya</h4>
                    <div class="row">
                        @php
                            $relatedKegiatan = \App\Models\Kegiatan::published()
                                ->where('id', '!=', $kegiatan->id)
                                ->where('kategori', $kegiatan->kategori)
                                ->limit(3)
                                ->get();
                            
                            if($relatedKegiatan->count() < 3) {
                                $remainingKegiatan = \App\Models\Kegiatan::published()
                                    ->where('id', '!=', $kegiatan->id)
                                    ->whereNotIn('id', $relatedKegiatan->pluck('id'))
                                    ->limit(3 - $relatedKegiatan->count())
                                    ->get();
                                
                                $relatedKegiatan = $relatedKegiatan->merge($remainingKegiatan);
                            }
                        @endphp

                        @foreach($relatedKegiatan as $related)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    @if($related->gambar)
                                        <img src="{{ asset('storage/' . $related->gambar) }}" 
                                             class="card-img-top related-kegiatan-img" alt="{{ $related->nama_kegiatan }}">
                                    @else
                                        <img src="{{ asset('assets/img/portfolio/Coming.PNG') }}" 
                                             class="card-img-top related-kegiatan-img" alt="{{ $related->nama_kegiatan }}">
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <span class="kategori-badge kategori-{{ strtolower($related->kategori) }} mb-2">
                                            {{ $related->kategori }}
                                        </span>
                                        <h6 class="card-title">{{ $related->nama_kegiatan }}</h6>
                                        <p class="card-text text-muted small">{{ $related->tanggal_kegiatan->format('d F Y') }}</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('kegiatan.detail', $related->id) }}" class="btn btn-primary btn-sm">
                                                Selengkapnya <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <!-- <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p> -->
                        <!-- <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe"> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row align-center justify-content-center">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>HME Poliban</h3>
                        <p>
                            Jalan Brigjen H. Hasan Basri, Pangeran<br>
                            Kec.Banjarmasin Utara, 707124<br>
                            Kalimantan Selatan <br><br>
                            <!--<strong>Phone:</strong> +1 5589 55488 55<br>-->
                            <strong>Email:</strong> hmepoliban14@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Menu Utama</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}#hero">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}#about">Tentang Kami</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}#team">Divisi</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}#portfolio">Kegiatan</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}#mdprt">Media Partner</a></li>
                        </ul>
                    </div>


                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Social Media</h4>
                        <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> -->
                        <div class="social-links mt-3">
                            <!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a> -->
                            <a href="https://www.instagram.com/hme_poliban?igsh=MWJvazUzOGZmdDMweg=="
                                class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="http://www.youtube.com/@hmepoliban396" class="youtube"><i
                                    class="bx bxl-youtube"></i></a>
                            <a href="https://www.facebook.com/profile.php?id=100077874230516" class="facebook"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="https://www.tiktok.com/@hmepoliban?_t"=8lozKMNjDw0&_r=1=100077874230516"
                                class="tiktok"><i class="bx bxl-tiktok"></i></a>
                            <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>HME Poliban</span></strong>.
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                {{-- All Rights Reserved --}}
                <a href="https://www.instagram.com/hmsakif__/"><i class="ri-instagram-fill">Maintain by Hmsakif__</i></a>
            </div>
        </div>
    </footer>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
