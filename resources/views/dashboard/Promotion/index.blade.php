@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Our Promotions</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @can('admin')
        <a href="/dashboard/promotions/create" class="btn btn-primary mb-3">Create new Promotions</a>
    @endcan

    {{-- Card --}}
    @if ($promotions->count())
        @foreach ($promotions as $promotion)
            <div class="row d-flex bg-dark text-white py-3 mt-4 rounded">
                <div class="col-md-3 ">
                    <div class="justify-content-start" style="width: 18rem;">
                        <img src="https://source.unsplash.com/230x370/?gym" class="rounded border border-secondary"
                            alt="Healty Fitness">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="justify-content-end">
                        <h3>{{ $promotion->name }}</h3>
                        <p>{!! $promotion->descriptions !!}</p>
                    </div>
                    <h6 class="mb-2 text-secondary">{{ $promotion->created_at->diffForHumans() }}</h6>
                    @can('admin')
                        <a href="/dashboard/promotions/{{ $promotion->slug }}/edit" class="mt-3 btn btn-warning mb-3">Edit
                            Promotions</a>
                    @endcan
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center fs-4">No Promotions Found.</p>
    @endif
    {{-- Card --}}
@endsection
