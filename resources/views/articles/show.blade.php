@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">

    <style>
        .left-side {
            width: 40%;
        }

        .right-side {
            width: 60%;
        }

        .articles-image {
            height: 80px;
            margin: 0;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                <h2 class="fw-bold">{{ $article->title }}</h2>
                <p class="text-secondary fs-sm">
                    <i class="bi bi-person"></i> {{ $article->user->name }}
                    <i class="bi bi-pen ms-2"></i>
                    {{ date('d M Y', strtotime($article->created_at)) }}
                </p>
                <a href="" class="fs-md rounded-pill px-3"
                    style="width: fit-content; background-color: {{ $article->category->background }}; color: {{ $article->category->color }}; ">
                    {{ $article->category->name }}
                </a>
                <hr>
                <p>
                    {{ $article->description }}
                </p>
                <img src="{{ $article->thumbnail }}" alt="" class="img-fluid w-100">
                <div class="body my-3">
                    {{ $article->body }}
                </div>
            </div>

            <div class="col-md-4">
                <h5 class="fw-bold">Berita lainnya oleh {{ $article->user->name }}</h5>
                @foreach ($user_articles as $article)
                    <div class="row my-3">
                        <a href="" class="left-side">
                            <div class="articles-image" style="background-image: url('{{ $article->thumbnail }}')">
                            </div>
                        </a>
                        <a href="" class="right-side">
                            <div class="articles-title fw-bold fs-md">{{ $article->title }}</div>
                        </a>
                    </div>
                @endforeach

                <hr>

                <h5 class="fw-bold">Berita lainnya di kategori {{ $article->category->name }}</h5>
                @foreach ($category_articles as $article)
                    <div class="row my-3">
                        <a href="" class="left-side">
                            <div class="articles-image" style="background-image: url('{{ $article->thumbnail }}')">
                            </div>
                        </a>
                        <a href="" class="right-side d-flex flex-column justify-content-between">
                            <div class="articles-title fw-bold fs-md">{{ $article->title }}</div>
                            <p class="text-secondary fs-sm">
                                <i class="bi bi-pen"></i>
                                {{ date('d M Y', strtotime($article->created_at)) }}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection