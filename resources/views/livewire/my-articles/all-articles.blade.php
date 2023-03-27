<div class="card-body table-responsive">
    <div class="row align-items-center">
        <h5 class="card-title col-md-6">Semua berita saya</h5>
        <a href="" class="btn btn-primary col-md-6" style="height: fit-content; width: fit-content">
            <i class="bi bi-plus"></i>
            <span>Tulis Berita</span>
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" style="width: 50px">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
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
                        <img src="https://source.unsplash.com/300x200?{{ $article->category->name }}"
                            alt="gambar berita" class="img-fluid">
                    </td>
                    <td>{{ $article->category->name }}</td>
                    <td>{{ $article->is_approved ? 'Disetujui' : 'Belum disetujui' }}</td>
                    <td class="text-center">
                        <a href="" class="badge bg-info text-white"><i class="bi bi-eye"></i></a>
                        <a href="/edit" class="badge bg-warning text-white"><i class="bi bi-pencil-square"></i></a>
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

    {{ $articles->links() }}
</div>
