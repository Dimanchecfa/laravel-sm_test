<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />


    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token1" content="{{ csrf_token() }}">
    <meta name="csrf-token2" content="{{ csrf_token() }}">

</head>

<body class=" hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Main Header -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">


                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index3.html" class="nav-link text-lg {{ Request::is('/product') ? 'text-bold' : '' }}">
                                Produits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('page-header')
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2014-2022 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>


    <script src=" {{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src=" {{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src=" {{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>


    <script src=" {{ asset('assets/dist/js/adminlte.min.js')}}"></script>
    <script src=" {{asset('assets/dist/js/search.js')}}"></script>
    <script src=" {{asset('assets/dist/js/search_product.js')}}"></script>
    <script src=" {{asset('assets/dist/js/search_category.js')}}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    AdminLTE for demo purposes
    <script src="../../dist/js/demo.js"></script>

</body>

</html>
