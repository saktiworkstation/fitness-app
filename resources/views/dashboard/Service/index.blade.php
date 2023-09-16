@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Our Service</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @can('admin')
        <a href="/dashboard/services/create" class="btn btn-primary mb-3">Create new Service</a>
    @endcan

    <div class="row justify-content-center">
        @if ($services->count())
            @foreach ($services as $service)
                <div class="col-md-6 my-2">
                    <div class="card text-center">
                        <div class="card-header">
                            Our Services #{{ $loop->iteration }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text">Untuk harga yaitu Rp.{{ $service->price }},00</p>
                            @can('admin')
                                <a href="/dashboard/services/{{ $service->slug }}/edit" class="btn btn-primary">Edit
                                    Services</a>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center fs-4">No Services Found.</p>
        @endif
    </div>
@endsection
