<div class="card-body table-responsive">
    <h5 class="card-title">Semua berita saya (belum disetujui)</h5>

    <div class="mb-3 d-flex justify-content-between">
        <a href="" class="btn btn-primary col-md-6" style="height: fit-content; width: fit-content">
            <i class="bi bi-plus"></i>
            <span>Tulis Berita</span>
        </a>

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Cari..." wire:model='search'>
                <button type="button" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>

    @if ($articles->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width: 50px">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width: 110px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->description }}</td>
                        <td>
                            <img src="{{ $article->thumbnail }}"
                                alt="gambar berita" class="img-fluid">
                        </td>
                        <td>{{ $article->category->name }}</td>
                        <td>
                            <span class="badge {{ $article->is_approved ? 'bg-success' : 'bg-warning' }}">{{ $article->is_approved ? 'Disetujui' : 'Belum disetujui' }}</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('articles.show', $article->slug) }}" class="badge bg-info text-white"><i class="bi bi-eye"></i></a>
                            <a href="/edit" class="badge bg-warning text-white"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return(alert('Apakah anda yakin?'))"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <label>
                <select class="dataTable-selector" wire:model='entries'>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
                data per halaman
            </label>
            {{ $articles->links() }}
        </div>
    @else
        <div class="h5 text-center mt-3">Berita tidak ditemukan</div>
    @endif
</div>
