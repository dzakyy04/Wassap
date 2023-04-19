@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
    <style>
        .articles-image {
            height: 80px;
            margin: 0;
        }
    </style>
    @livewireStyles
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.body table').addClass('table table-bordered');
    </script>
    @livewireScripts
    <script>
        Livewire.on('comment_store', commentId => {
            Swal.fire(
                'Berhasil',
                'Komentar berhasil ditambahkan',
                'success'
            ).then(() => {
                setTimeout(() => {
                    let scroll = document.getElementById('comment-' + commentId);
                    scroll.scrollIntoView({
                        behavior: 'smooth'
                    });
                }, 500);
            });
        });

        Livewire.on('comment_edit', commentId => {
            Swal.fire(
                'Berhasil',
                'Komentar berhasil diedit',
                'success'
            ).then(() => {
                setTimeout(() => {
                    let scroll = document.getElementById('comment-' + commentId);
                    scroll.scrollIntoView({
                        behavior: 'smooth'
                    });
                }, 500);
            });
        });
    </script>
@endpush

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8">
                <h1 class="fw-bold text-main">{{ $article->title }}</h1>
                <p class="text-dark">
                    {{ $article->description }}
                </p>
                <div class="d-flex align-items-center">
                    <img src="{{ $article->user->profile_picture }}" alt="Foto {{ $article->user->username }}"
                        class="img-fluid rounded-circle photo-user">
                    <div class="ms-2">
                        <div class="text-secondary">Oleh <a href="" class="user-name">{{ $article->user->name }}</a>
                        </div>
                        <div class="text-secondary fs-md">
                            {{ date('d M Y H:i', strtotime($article->created_at)) }} WIB
                        </div>
                    </div>
                </div>
                <hr>
                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Gambar {{ $article->title }}"
                    class="img-fluid">
                <div class="body my-3 text-dark">
                    {!! $article->body !!}
                </div>

                <hr>

                <div class="comments my-4">
                    @livewire('articles.comment', ['id' => $article->id])
                </div>
            </div>

            <div class="col-md-4 sticky-top z-0" style="height: fit-content; top: 1rem">
                @if ($user_articles->count())
                    <h5 class="fw-bold text-main">Berita lainnya oleh {{ $article->user->name }}</h5>
                    @foreach ($user_articles as $article)
                        <div class="row my-3">
                            <a href="{{ route('articles.show', $article->slug) }}" class="left-side">
                                <div class="articles-image" style="background-image: url('{{ $article->thumbnail }}')">
                                </div>
                            </a>
                            <a href="{{ route('articles.show', $article->slug) }}" class="right-side">
                                <div class="articles-title fw-bold fs-md">{{ $article->title }}</div>
                                <p class="text-secondary fs-sm">
                                    <i class="bi bi-pen"></i>
                                    {{ date('d M Y', strtotime($article->created_at)) }}
                                </p>
                            </a>
                        </div>
                    @endforeach
                    <hr>
                @endif

                @if ($category_articles->count())
                    <h5 class="fw-bold text-main">Berita lainnya di kategori {{ $article->category->name }}</h5>
                    @foreach ($category_articles as $article)
                        <div class="row my-3">
                            <a href="{{ route('articles.show', $article->slug) }}" class="left-side">
                                <div class="articles-image" style="background-image: url('{{ $article->thumbnail }}')">
                                </div>
                            </a>
                            <a href="{{ route('articles.show', $article->slug) }}" class="right-side d-flex flex-column justify-content-between">
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
