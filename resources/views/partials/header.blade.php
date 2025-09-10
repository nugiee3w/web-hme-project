    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
    
            <div class="logo me-auto d-flex align-items-center">
                <img src="{{ asset('assets/img/hme.png') }}" alt="HME Logo" style="height: 40px; margin-right: 10px;">
                <h1 style="margin: 0;"><a href="index.html">HME POLIBAN</a></h1>
            </div>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#Strukturorganisasi">Struktur organisasi</a></li>
                    <li><a class="nav-link scrollto" href="#fungsionaris">Fungsionaris</a></li>
                    <li><a class="nav-link scrollto" href="#team">Divisi</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Kegiatan</a></li>
                    <li><a class="nav-link scrollto" href="#mdprt">Media Partner</a></li>
                    {{-- <li><a class="nav-link scrollto" href="#oprc">Open Recruitment</a></li> --}}
                    <li>
                        <a class="nav-link scrollto" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header>
