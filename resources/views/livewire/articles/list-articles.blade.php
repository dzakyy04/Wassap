@push('js')
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
@endpush

<div>
    @livewire('articles.headlines')

    <div class="row">
        @if (Request('cari') != '')
            <h4 class="text-main fw-bold mb-3"><i class="bi bi-search text-main"></i> Hasil pencarian :
                {{ Request('cari') }}</h4>
        @endif

        <div class="col-md-12 d-flex" style="overflow-x: auto">
            <div wire:click="setCategory('semua')" data-slug="semua"
                class="categories @if ($category === 'semua') active @endif rounded-top px-3 fw-bold">Semua</div>
            @foreach ($categories as $category)
                <div wire:click="setCategory('{{ $category->slug }}')" data-slug="{{ $category->slug }}"
                    class="categories @if ($this->category === $category->slug) active @endif rounded-top px-3 fw-bold">
                    {{ $category->name }}
                </div>
            @endforeach
        </div>
        <hr>
    </div>

    @if ($articles->count())
        <div class="row">
            <h3 class="fw-bold mb-3 text-poppins text-main">Berita Terbaru</h3>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row articles-card">
                            {{-- Thumbnail --}}
                            <div class="col-md-12">
                                <a href="{{ route('articles.show', $articles[0]->slug) }}">
                                    @if (strpos($articles[0]->thumbnail, 'article-thumbnail') !== false)
                                        <div class="articles-image"
                                            style="background-image: url('{{ asset('storage/' . $articles[0]->thumbnail) }}')">
                                        </div>
                                    @else
                                        <div class="articles-image"
                                            style="background-image: url('{{ $articles[0]->thumbnail }}')">
                                        </div>
                                    @endif
                                </a>
                            </div>
                            <div class="col-md-12 mt-2">
                                {{-- Category --}}
                                <a href="" class="badge fs-md rounded-pill px-3"
                                    style="width: fit-content; background-color: {{ $articles[0]->category->background }}; color: {{ $articles[0]->category->color }};">
                                    {{ $articles[0]->category->name }}
                                </a>

                                {{-- Description --}}
                                <a href="{{ route('articles.show', $articles[0]->slug) }}">
                                    <h5 class="fw-bold articles-title">{{ $articles[0]->title }}</h5>
                                    <p class="text-secondary fs-sm">
                                        <i class="bi bi-person"></i> {{ $articles[0]->user->name }}
                                        <i class="bi bi-pen ms-2"></i>
                                        {{ date('d M Y', strtotime($articles[0]->created_at)) }}
                                    </p>
                                    <div class="text-secondary fs-md">{{ $articles[0]->description }}</div>
                                    <p class="fs-md fw-bold read-more  mt-2 mb-0">
                                        <span>BACA SELENGKAPNYA</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr class="d-none">

                    <div class="col-md-7">
                        @if (isset($articles[1]))
                            <div class="row articles-card">
                                {{-- Thumbnail --}}
                                <div class="col-md-5 articles-thumbnail">
                                    <a href="{{ route('articles.show', $articles[1]->slug) }}">
                                        @if (strpos($articles[1]->thumbnail, 'article-thumbnail') !== false)
                                            <div class="articles-image"
                                                style="background-image: url('{{ asset('storage/' . $articles[1]->thumbnail) }}')">
                                            </div>
                                        @else
                                            <div class="articles-image"
                                                style="background-image: url('{{ $articles[1]->thumbnail }}')">
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="col-md-7 articles-content">
                                    {{-- Category --}}
                                    <a href="" class="badge fs-md rounded-pill px-3"
                                        style="
                                            width: fit-content;
                                            background-color: {{ $articles[1]->category->background }};
                                            color: {{ $articles[1]->category->color }};
                                        ">
                                        {{ $articles[1]->category->name }}
                                    </a>

                                    {{-- Description --}}
                                    <a href="{{ route('articles.show', $articles[1]->slug) }}" class="mt-5">
                                        <h5 class="fw-bold articles-title">{{ $articles[1]->title }}</h5>
                                        <p class="text-secondary fs-sm">
                                            <i class="bi bi-person"></i> {{ $articles[1]->user->name }}
                                            <i class="bi bi-pen ms-2"></i>
                                            {{ date('d M Y', strtotime($articles[1]->created_at)) }}
                                        </p>
                                        <div class="text-secondary fs-md">{{ $articles[1]->description }}</div>
                                        <p class="fs-md fw-bold read-more  mt-2 mb-0">
                                            <span>BACA SELENGKAPNYA</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif

                        <hr class="d-none">

                        @if (isset($articles[2]))
                            <div class="row articles-card mt-3">
                                {{-- Thumbnail --}}
                                <div class="col-md-5 articles-thumbnail">
                                    <a href="{{ route('articles.show', $articles[2]->slug) }}">
                                        @if (strpos($articles[2]->thumbnail, 'article-thumbnail') !== false)
                                            <div class="articles-image"
                                                style="background-image: url('{{ asset('storage/' . $articles[2]->thumbnail) }}')">
                                            </div>
                                        @else
                                            <div class="articles-image"
                                                style="background-image: url('{{ $articles[2]->thumbnail }}')">
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="col-md-7 articles-content">
                                    {{-- Category --}}
                                    <a href="" class="badge fs-md rounded-pill px-3"
                                        style="
                                            width: fit-content;
                                            background-color: {{ $articles[2]->category->background }};
                                            color: {{ $articles[2]->category->color }};
                                        ">
                                        {{ $articles[2]->category->name }}
                                    </a>

                                    {{-- Description --}}
                                    <a href="{{ route('articles.show', $articles[2]->slug) }}" class="mt-5">
                                        <h5 class="fw-bold articles-title">{{ $articles[2]->title }}</h5>
                                        <p class="text-secondary fs-sm">
                                            <i class="bi bi-person"></i> {{ $articles[2]->user->name }}
                                            <i class="bi bi-pen ms-2"></i>
                                            {{ date('d M Y', strtotime($articles[2]->created_at)) }}
                                        </p>
                                        <div class="text-secondary fs-md">{{ $articles[2]->description }}</div>
                                        <p class="fs-md fw-bold read-more  mt-2 mb-0">
                                            <span>BACA SELENGKAPNYA</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <hr>

        @if ($articles->count() > 3)
            <div class="row">
                <div class="col-md-8">
                    <h4 class="fw-bold text-poppins text-main mb-3">Semua Berita</h4>
                    @foreach ($articles->skip(3) as $article)
                        <div class="col-md-12 mt-2">
                            <div class="row articles-card">
                                <div class="col-md-7 articles-content">
                                    {{-- Category --}}
                                    <a href="" class="badge fs-md rounded-pill px-3"
                                        style="
                                            width: fit-content;
                                            background-color: {{ $article->category->background }};
                                            color: {{ $article->category->color }};
                                        ">
                                        {{ $article->category->name }}
                                    </a>

                                    {{-- Description --}}
                                    <a href="{{ route('articles.show', $article->slug) }}">
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
                                    <a href="{{ route('articles.show', $article->slug) }}">
                                        @if (strpos($article->thumbnail, 'article-thumbnail') !== false)
                                            <div class="articles-image"
                                                style="background-image: url('{{ asset('storage/' . $article->thumbnail) }}')">
                                            </div>
                                        @else
                                            <div class="articles-image"
                                                style="background-image: url('{{ $article->thumbnail }}')">
                                            </div>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>
        @endif
        {{ $articles->links() }}
    @else
        <div class="row">
            <h3 class="text-main my-3 fw-bold text-center">Berita tidak tersedia</h3>
        </div>
    @endif
</div>
