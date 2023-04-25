@extends('dashboard.layouts.main')
@push('css')
    @livewireStyles
@endpush
@push('js')
    @livewireScripts
@endpush
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @livewire('admin.manage-article')
                </div>
            </div>
        </div>
    </section>
@endsection
