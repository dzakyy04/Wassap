<div class="card-body table-responsive">
    <h5 class="card-title">Semua Pengguna</h5>

    <div class="mb-3 d-flex justify-content-end">
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Cari..." wire:model='search'>
                <button type="button" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col" style="width: 50px">No</th>
                <th scope="col">Nama pengguna</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">Jumlah Berita</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td class="text-center fw-bold">{{ $users->firstItem() + $index }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">{{ $user->articles->count() }}</td>
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
        {{ $users->links() }}
    </div>

</div>
