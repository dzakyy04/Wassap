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

        .container .col-md-8 .body img {
            max-height: 300px;
            width: auto;
        }

        .user-name {
            color: var(--main);
            font-weight: bold;
        }

        .user-name:hover {
            color: var(--second);
            transition: .3s;
        }

        .photo-user {
            width: 3.5rem;
            height: 3.5rem;
        }
    </style>
@endpush

@push('js')
    <script>
        $('.body table').addClass('table table-bordered');
    </script>
@endpush

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                <h1 class="fw-bold">{{ $article->title }}</h1>
                <p class="fs-5">
                    {{ $article->description }}
                </p>
                <div class="d-flex align-items-center">
                    <img src="{{ $article->user->profile_picture }}" alt="Foto {{ $article->user->username }}"
                        class="img-fluid rounded-circle photo-user">
                    <div class="ms-2">
                        <div class="text-secondary">Oleh <a href="" class="user-name">{{ $article->user->name }}</a></div>
                        <div class="text-secondary fs-md">
                            {{ date('d M Y H:i:s', strtotime($article->created_at)) }} WIB
                        </div>
                    </div>
                </div>
                <hr>
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Gambar {{ $article->title }}"
                    class="img-fluid">
                <div class="body my-3">
                    {!! $article->body !!}
                </div>
            </div>

            <div class="col-md-4">
                @if ($user_articles->count())
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
                @endif

                @if ($category_articles->count())
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
                @endif
            </div>
        </div>
    </div>
@endsection
