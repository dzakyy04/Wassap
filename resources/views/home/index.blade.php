@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <div class="landing-page bg-sky">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="left col-md-6 text-center">
                    <img src="{{ asset('img/model.png') }}" class="img-fluid model" alt="model" height="400">
                </div>
                <div class="right col-md-6">
                    <div>
                        <img src="{{ asset('img/logo-wassap.png') }}" class="img-fluid logo-wassap" alt="logo wassap"
                            width="200px">
                        <h2 class="tagline fw-bold text-poppins mt-3">Berita Terkini dan Terpercaya,
                            Selalu Update di Tangan Anda!</h2>
                        <div class="mt-3">
                            <a href="" class="btn btn-primary text-light fw-bold">
                                Baca Berita
                            </a>
                            <a href="" class="btn btn-warning text-light fw-bold">
                                Tulis Berita
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="articles container py-5">
        <div class="row">
            <div class="col-md-8">
                <h4 class="fw-bold text-poppins mb-3">Berita Terbaru</h4>
                @foreach ($articles as $article)
                    <div class="col-md-12 mt-2">
                        <div class="row articles-card align-articles-center">
                            <div class="row articles-card">
                                <div class="col-md-7 articles-content">
                                    {{-- Category --}}
                                    <a href="" class="fs-md rounded-pill px-3"
                                        style="
                                            width: fit-content;
                                            background-color: {{ $article->category->background }};
                                            color: {{ $article->category->color }};
                                        ">
                                        {{ $article->category->name }}
                                    </a>

                                    {{-- Description --}}
                                    <a href="" class="mt-5">
                                        <h5 class="fw-bold articles-title">{{ $article->title }}</h5>
                                        <p class="text-secondary fs-sm">
                                            <i class="bi bi-person"></i> {{ $article->user->name }}
                                            <i class="bi bi-pen ms-2"></i>
                                            {{ date('d M Y', strtotime($article->created_at)) }}
                                        </p>
                                        <div class="text-secondary fs-md">{{ $article->description }}</div>
                                        <p class="fs-md fw-bold read-more  mt-2 mb-0">
                                            <span>BACA SELENGKAPNYA</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </p>
                                    </a>
                                </div>

                                {{-- Thumbnail --}}
                                <div class="col-md-5 articles-thumbnail">
                                    <a href="">
                                        <div class="articles-image"
                                            style="background-image: url('{{ $article->thumbnail }}')">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                @endforeach
            </div>
            <div class="col-md-4 sticky-top" style="height: fit-content; top: 1rem">
                <h5 class="fw-bold text-poppins">Temukan lebih banyak hal yang penting bagi Anda</h5>
                @foreach ($categories->chunk(2) as $chunk)
                    <div class="row my-2">
                        <div class="col-md-12">
                        @foreach ($chunk as $category)
                                <a href="" class="fs-md rounded-pill px-3 me-1"
                                    style="
                                    width: fit-content;
                                    background-color: {{ $category->background }};
                                    color: {{ $category->color }};
                                ">
                                    {{ $category->name }}
                                </a>
                                @endforeach
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
