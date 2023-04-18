<div>
    <h3 class="text-main">Komentar (0)</h3>
    <form action="" wire:submit.prevent="addComment" class="mb-4">
        <textarea name="" id="" class="form-control" placeholder="Tulis Komentarmu..."></textarea>
        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </form>

    <div class="comment">
        @foreach (range(1, 10) as $item)            
        <div class="d-flex">
            <img src="https://www.svgrepo.com/show/170303/avatar.svg" class="rounded-circle photo-user">
            <div class="data-comment ms-3">
                {{-- <span class="fw-bold">Dewa Sheva Dzaky</span>&nbsp;<span class="text-secondary fs-sm">8 Menit yang lalu</span> --}}
                <p>Dewa Sheva Dzaky <span class="text-secondary fs-sm">8 Menit yang lalu</span></p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam nesciunt molestiae reprehenderit incidunt nisi vero!</p>
                <span class="fs-md text-main">Balas</span>
                &nbsp;
                &nbsp;
                <span class="fs-md text-main">Edit</span>
                &nbsp;
                &nbsp;
                <span class="fs-md text-main">Hapus</span>
            </div>
        </div>

        <hr>
        @endforeach
    </div>
</div>
