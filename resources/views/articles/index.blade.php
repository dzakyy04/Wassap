@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">

    <style>


    </style>
    @livewireStyles
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        document.querySelectorAll('.categories').forEach((element) => {
            element.addEventListener('click', (event) => {
                event.preventDefault();
                let categorySlug = event.target.getAttribute('data-slug');
                let url = new URL(window.location.href);
                url.searchParams.set('category', categorySlug);
                window.history.pushState({}, '', url);
            });
        });
    </script>
    
    <script>
        const swiper = new Swiper('.swiper', {
            direction: 'horizontal',
            loop: true,
            slidesPerView: 'auto',
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    </script>
    @livewireScripts
@endpush

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                @livewire('articles.list-articles')
            </div>
        </div>
    </div>
@endsection
