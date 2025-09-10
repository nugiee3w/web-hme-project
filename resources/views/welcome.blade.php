<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Himpunan Mahasiswa Elektro - Politeknik Negeri Banjarmasin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/hme.png" rel="icon">
    <link href="assets/img/hme.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
</head>

<body>
    {{-- Header --}}
    @include('partials.header')

    {{-- Hero Section --}}
    @include('partials.hero')

    <main id="main">
        {{-- Logo Section --}}
        @include('partials.logo')

        {{-- About Us Section --}}
        @include('partials.aboutUs')

        {{-- Struktur Organisasi Section --}}
        @include('partials.strukturOrganisasi')

        {{-- Fungsionaris Section --}}
        @include('partials.fungsionaris')

        {{-- Divisi Section --}}
        @include('partials.divisi')

        {{-- Profile Video Section --}}
        @include('partials.profileVideo')

        {{-- Portofolio Section --}}
        @include('partials.portofolio')
    </main><!-- End #main -->

    {{-- Media Partner Section --}}
    @include('partials.mediaPartner')
    
    <hr style="border: 1px solid #37517e; margin: 40px 0;"> {{-- Garis Pemisah --}}

    {{-- OpenRecruitment Section - ARCHIVED --}}
    {{-- @include('partials.openRecruitment') --}}

    {{-- Footer --}}
    @include('partials.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <!-- Custom Modal Scripts -->
    <script src="js/modals.js"></script>
    <script src="js/divisi-modals.js"></script>
    <script src="js/fungsionaris-modals.js"></script>

    <!-- Custom CSS Styles -->
    <style>
        .carousel-dot.active {
            background: #37517e !important;
            opacity: 1 !important;
            transform: scaleX(1.3);
        }
        
        .carousel-dot:hover {
            background: #37517e !important;
            opacity: 0.8 !important;
            transform: scaleX(1.1);
        }
        
        .carousel-member-card {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .member-carousel {
            border: 2px solid #e9ecef;
        }
        
        .carousel-nav-btn {
            transition: all 0.3s ease;
        }
        
        .carousel-nav-btn:hover {
            background: rgba(55, 81, 126, 0.9) !important;
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            opacity: 1 !important;
        }
        
        .divisi-description,
        .fungsionaris-description {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 25px;
            border-radius: 15px;
            border-left: 5px solid #37517e;
            height: fit-content;
        }
        
        .stat-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        /* Styling untuk icon Instagram di modal - sama dengan divisi cards */
        .modal-social-link {
            transition: ease-in-out 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            width: 32px;
            height: 32px;
            background: #eff2f8;
            margin: 0 auto;
            text-decoration: none;
        }
        
        .modal-social-link i {
            color: #37517e;
            font-size: 16px;
            margin: 0 2px;
        }
        
        .modal-social-link:hover {
            background: #47b2e4;
        }
        
        .modal-social-link:hover i {
            color: #fff;
        }
    </style>
</body>

</html>
