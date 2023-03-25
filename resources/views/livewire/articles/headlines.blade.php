@if ($headlines->count())
    <div class="row mb-5">
        <h3 class="fw-bold mb-3 text-poppins text-main">Berita utama</h3>
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($headlines as $headline)
                    <div class="swiper-slide">
                        <a href="{{ route('articles.show', $headline->slug) }}">
                            <div class="headlines" style="background-image: url('{{ $headline->thumbnail }}');">
                                <div class="desc position-absolute bottom-0 px-3 py-3">
                                    <div class="text-white fw-bold">
                                        {{ $headline->title }}
                                    </div>

                                    <div class="text-white fs-sm mt-3">
                                        <i class="bi bi-person text-white"></i> {{ $headline->user->name }}
                                        <i class="bi bi-pen text-white ms-2"></i>
                                        {{ date('d M Y', strtotime($headline->created_at)) }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
