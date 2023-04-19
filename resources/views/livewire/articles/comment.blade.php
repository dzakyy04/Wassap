<div>
    <h4 class="text-main">Komentar (0)</h4>
    @auth
        <form wire:submit.prevent="store" class="mb-4">
            <textarea wire:model.defer="body" class="form-control @error('body')
                is-invalid
            @enderror"
                placeholder="Tulis Komentarmu..."></textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    @else
        <div class="alert alert-warning" role="alert">
            Silahkan masuk terlebih dahulu untuk memberikan komentar!
        </div>
    @endauth

    <div class="comment">
        @foreach (range(1, 10) as $item)
            <div class="d-flex">
                <img src="https://www.svgrepo.com/show/170303/avatar.svg" class="rounded-circle photo-user">
                <div class="data-comment ms-3">
                    <p>Dewa Sheva Dzaky&nbsp;&nbsp;<span class="text-secondary fs-sm">8 Menit yang lalu</span></p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam nesciunt molestiae reprehenderit
                        incidunt nisi vero!</p>
                    <span class="comment-menu fs-md text-main">Balas</span>
                    &nbsp;
                    <span class="comment-menu fs-md text-main">Edit</span>
                    &nbsp;
                    <span class="comment-menu fs-md text-main">Hapus</span>
                </div>
            </div>

            <hr>
        @endforeach
    </div>
</div>
