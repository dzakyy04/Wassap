@extends('dashboard.layouts.main')

@push('css')
    @livewireStyles
    <style>
        .search-bar {
            min-width: 360px;
        }

        .search-form {
            width: 100%;
        }

        .search-form input {
            border: 0;
            font-size: 14px;
            color: #012970;
            border: 1px solid rgba(1, 41, 112, 0.2);
            padding: 7px 38px 7px 8px;
            border-radius: 3px;
            transition: 0.3s;
            width: 100%;
        }

        .search-form input:focus,
        .search-form input:hover {
            outline: none;
            box-shadow: 0 0 10px 0 rgba(1, 41, 112, 0.15);
            border: 1px solid rgba(1, 41, 112, 0.3);
        }

        .search-form button {
            border: 0;
            padding: 0;
            margin-left: -30px;
            background: none;
        }

        .search-form button i {
            color: #012970;
        }
    </style>
@endpush

@push('js')
    @livewireScripts
@endpush

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @livewire('my-articles.all-articles')
                </div>
            </div>
        </div>
    </section>
@endsection
