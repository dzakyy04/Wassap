<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon-wassap.svg') }}">

    {{-- Bootsrap css --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- App CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Loader CSS --}}
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    @stack('css')
</head>

<body>
    <div class="loading overlay">
        <div class="loadingio-spinner-double-ring-45u0ca26v7n">
            <div class="ldio-vfewod972nj">
                <div></div>
                <div></div>
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    {{-- Bootsrap js --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{-- Loader --}}
    <script src="{{ asset('js/loader.js') }}"></script>

    @stack('js')
</body>

</html>
