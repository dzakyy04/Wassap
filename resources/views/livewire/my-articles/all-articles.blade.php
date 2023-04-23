@push('js')
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Setelah dihapus, data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#033587',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteArticle(id);
                    Swal.fire(
                        'Terhapus',
                        'Data berhasil dihapus',
                        'success'
                    )
                }
            })
        }

        function deleteArticle(id) {
            Livewire.emit('deleteArticle', id);
        }
    </script>
@endpush

<div class="card-body table-responsive">
    <h5 class="card-title">Berita saya</h5>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                })
            });
        </script>
    @endif

    <div class="mb-3 d-flex justify-content-between">
        <a href="{{ route('create-news') }}" class="btn btn-primary col-md-6"
            style="height: fit-content; width: fit-content">
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
                <tr class="text-center">
                    <th scope="col" style="width: 50px">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col" style="cursor: pointer;">
                        <div class="dropdown">
                            <span class=" dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">Kategori</span>
                            <ul class="dropdown-menu">
                                <li>
                                    <span class="dropdown-item" wire:click="$set('category', 'semua')">Semua</span>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <span class="dropdown-item"
                                            wire:click="$set('category', '{{ $category->slug }}')">{{ $category->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </th>
                    <th scope="col" style="cursor: pointer;">
                        <div class="dropdown">
                            <span class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Status</span>
                            <ul class="dropdown-menu">
                                <li>
                                    <span class="dropdown-item" wire:click="$set('status', 'semua')">Semua</span>
                                </li>
                                <li>
                                    <span class="dropdown-item" wire:click="$set('status', '1')">Disetujui</span>
                                </li>
                                <li>
                                    <span class="dropdown-item" wire:click="$set('status', '0')">Belum disetujui</span>
                                </li>
                            </ul>
                        </div>
                    </th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->description }}</td>
                        <td>
                            @if (strpos($article->thumbnail, 'article-thumbnail') !== false)
                                <img src="{{ asset('storage/' . $article->thumbnail) }}"
                                    alt="Gambar {{ $article->title }}" class="img-fluid">
                            @else
                                <img src="{{ asset($article->thumbnail) }}" alt="Gambar {{ $article->title }}"
                                    class="img-fluid">
                            @endif
                        </td>
                        <td>{{ $article->category->name }}</td>
                        <td class="text-center">
                            <span
                                class="badge {{ $article->is_approved ? 'bg-success' : 'bg-warning' }} w-100">{{ $article->is_approved ? 'Disetujui' : 'Belum disetujui' }}</span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="badge bg-info text-white"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('edit-news', $article->slug) }}"
                                    class="badge bg-warning text-white mx-1"><i class="bi bi-pencil-square"></i></a>
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="confirmDelete({{ $article->id }})">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </div>
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
