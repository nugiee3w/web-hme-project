<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">
    <!-- <title>@yield('title') &mdash; SIRAPAT - Sistem Informasi Rapat</title> -->
    <title>SIRAPAT - Sistem Informasi Rapat</title>

    <!-- Google Fonts (konsisten dengan halaman utama) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/components.css') }}">
        
    <!-- Font consistency CSS -->
    <style>
        /* Font consistency dengan halaman utama */
        body, .auth-wrapper, .card, .form-control, .btn {
            font-family: "Open Sans", sans-serif !important;
        }
        
        h1, h2, h3, h4, h5, h6, .card-header {
            font-family: "Jost", sans-serif !important;
        }
        
        .btn, .badge, label {
            font-family: "Poppins", sans-serif !important;
        }
    </style>
    
    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
    {{-- logo --}}
    <link rel="icon" href="{{ asset('assets/img/hme.png') }}" type="Logo-HME">

    <!-- <style>
        body {
            background: linear-gradient(
                rgba(55, 81, 126, 0.5), /* Warna biru #37517e transparan di bagian atas */
                rgba(55, 81, 126, 0.5) /* Warna biru #37517e transparan di bagian bawah */
            ), url('{{ asset('img/Poliban.jpg') }}');
            background-size: cover; /* Atur agar gambar mengisi seluruh layar */
        }
    </style> -->


</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="{{ Request::is('auth-register') ? 'col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2' : 'col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4' }}">
                        <!-- Footer -->
                        @include('components.auth-header')

                        <!-- Content -->
                        @yield('main')

                        <!-- Footer -->
                        @include('components.auth-footer')
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
