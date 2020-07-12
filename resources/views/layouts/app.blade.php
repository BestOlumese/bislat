<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('images/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}" type="image/x-icon">
    <title>{{ config('app.name', 'Laravel') }} - Admin Dashboard</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flag-icon.css') }}">

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jsgrid.css') }}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icofont.css') }}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prism.css') }}">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chartist.css') }}">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vector-map.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    
    @yield('content')
    
    <!-- latest jquery-->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    
    <!-- feather icon js-->
    <script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Sidebar jquery-->
    <script src="{{ asset('js/sidebar-menu.js') }}"></script>

    <!-- touchspin js-->
    <script src="{{ asset('js/touchspin/vendors.min.js') }}"></script>
    <script src="{{ asset('js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('js/touchspin/input-groups.min.js') }}"></script>
    
    <!--chartist js-->
    <script src="{{ asset('js/chart/chartist/chartist.js') }}"></script>

    <!-- form validation js-->
    <script src="{{ asset('js/dashboard/form-validation-custom.js') }}"></script>
    
    
    <!-- lazyload js-->
    <script src="{{ asset('js/lazysizes.min.js') }}"></script>
    
    <!--copycode js-->
    <script src="{{ asset('js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('js/custom-card/custom-card.js') }}"></script>
    
    <!--counter js-->
    <script src="{{ asset('js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/counter/counter-custom.js') }}"></script>

    <!-- Jsgrid js-->
    <script src="{{ asset('js/jsgrid/jsgrid.min.js') }}"></script>
    @yield('scripts')
    <script src="{{ asset('js/jsgrid/jsgrid-digital-sub.js') }}"></script>
    
    <!--Customizer admin-->
    <script src="{{ asset('js/admin-customizer.js') }}"></script>

    <!--map js-->
    <script src="{{ asset('js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!--apex chart js-->
    <script src="{{ asset('js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('js/chart/apex-chart/stock-prices.js') }}"></script>

    <!--chartjs js-->
    <script src="{{ asset('js/chart/flot-chart/excanvas.js') }}"></script>
    <script src="{{ asset('js/chart/flot-chart/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/chart/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('js/chart/flot-chart/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('js/chart/flot-chart/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('js/chart/flot-chart/jquery.flot.pie.js') }}"></script>
    <!--dashboard custom js-->
    <script src="{{ asset('js/dashboard/default.js') }}"></script>

    <!--right sidebar js-->
    <script src="{{ asset('js/chat-menu.js') }}"></script>

    <!--height equal js-->
    <script src="{{ asset('js/equal-height.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('js/lazysizes.min.js') }}"></script>

    <!--script admin-->
    <script src="{{ asset('js/admin-script.js') }}"></script>
    <script>
        $('.single-item').slick({
                arrows: false,
                dots: true
            }
        );
    </script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <!-- ckeditor js-->
    <script src="{{ asset('js/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/editor/ckeditor/styles.js') }}"></script>
    <script src="{{ asset('js/editor/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('js/editor/ckeditor/ckeditor.custom.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>
    @yield('scripts')
</body>
</html>
