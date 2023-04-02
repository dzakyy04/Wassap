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
    <h5 class="card-title">Kategori</h5>

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
            <span>Kelola Kategori</span>
        </a>

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Cari..." wire:model='search'>
                <button type="button" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>

    @if ($categories->count())
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col" style="width: 50px">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Tampilan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <img src="{{ $category->image }}" alt="gambar kategori" class="img-fluid">
                        </td>
                        <td>
                            <span class="badge fs-md rounded-pill px-3"
                                style="width: fit-content; background-color: {{ $category->background }}; color: {{ $category->color }};">
                                {{ $category->name }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href=""
                                    class="badge bg-info text-white"><i class="bi bi-eye"></i></a>
                                <a href="" class="badge bg-warning text-white mx-1"><i
                                        class="bi bi-pencil-square"></i></a>
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="">
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
            {{-- {{ $categories->links() }} --}}
        </div>
    @else
        <div class="h5 text-center mt-3">Berita tidak ditemukan</div>
    @endif
</div>
