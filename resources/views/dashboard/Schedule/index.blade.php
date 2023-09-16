@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Training Schedule</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @can('admin')
        <a href="/dashboard/schedules/create" class="btn btn-primary mb-3">Create new Training Schedule </a>
    @endcan

    <div class="row">
        @if ($schedules->count())
            @foreach ($schedules as $schedule)
                <div class="col-md-6 my-2">
                    <div class="card text-center">
                        <div class="card-header">
                            {{ $schedule->name }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $schedule->instructor }}</h5>
                            <p class="card-text">{!! $schedule->descriptions !!}</p>
                            @can('admin')
                                <a href="/dashboard/schedules/{{ $schedule->slug }}/edit" class="btn btn-primary">Edit
                                    Schedule</a>
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
