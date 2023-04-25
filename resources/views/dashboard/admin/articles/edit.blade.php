@extends('dashboard.layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ubah Status</h5>
                        <form action="{{ route('admin.update-article', $article->slug) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input disabled type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" placeholder="Masukkan judul"
                                    value="{{ old('title', $article->title) }}" onchange="slugArticle()">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Slug --}}
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input disabled type="text" class="form-control @error('slug') is-invalid @enderror"
                                        name="slug" id="slug" placeholder="Masukkan slug"
                                        value="{{ old('slug', $article->slug) }}">
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea disabled class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        placeholder="Masukkan deskripsi">{{ old('description', $article->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Thumbnail --}}
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    @if (strpos($article->thumbnail, 'article-thumbnail') !== false)
                                        <img src="{{ asset("storage/$article->thumbnail") }}"
                                            class="img-preview img-fluid mb-3 col-sm-3 d-block">
                                    @else
                                        <img src="{{ $article->thumbnail }}"
                                            class="img-preview img-fluid mb-3 col-sm-3 d-block">
                                    @endif
                                    <input disabled class="form-control @error('thumbnail') is-invalid @enderror"
                                        type="file" id="thumbnail" name="thumbnail" onchange="previewImage()">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Body --}}
                                <div class="mb-3">
                                    <label for="body" class="form-label">Isi Berita</label>
                                    <textarea disabled class="form-control" rows="3" id="body" name="body">{{ old('body', $article->body) }}</textarea>
                                    @error('body')
                                        <div class="mt-1" style="font-size: 14px; color:#b02a37">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select disabled class="form-select @error('category_id') is-invalid @enderror"
                                        id="category" name="category_id">
                                        <option value="" selected disabled>Pilih kategori</option>
                                        @foreach ($categories as $category)
                                            @if (old('category_id', $article->category_id) == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                </option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('is_approved') is-invalid @enderror" id="status"
                                        name="is_approved">
                                        <option value="" disabled>Ubah status</option>
                                        <option value="0" @if($article->is_approved == 0) selected @endif >Belum Disetujui</option>
                                        <option value="1" @if($article->is_approved == 1) selected @endif >Disetujui</option>
                                    </select>
                                </div>

                                <button type="submit" onclick="" class="btn btn-primary mt-3">Edit Berita</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
