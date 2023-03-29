<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name') }} - Dashboaard</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


    {{-- Bootsrap css --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    {{-- CSS Include --}}
    @stack('css')
</head>

<body>

    <!-- ======= Navbar ======= -->
    @include('dashboard.layouts.navbar')

    <!-- ======= Sidebar ======= -->
    @include('dashboard.layouts.sidebar')

    <main id="main" class="main">
        @yield('content')
    </main>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/dashboard.js') }}"></script>

    {{-- Bootstrap --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- JS Include --}}
    @stack('js')
</body>

</html>
