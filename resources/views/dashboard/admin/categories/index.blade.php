@extends('dashboard.layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @livewire('admin.manage-category')
                </div>
            </div>
        </div>
    </section>
@endsection
