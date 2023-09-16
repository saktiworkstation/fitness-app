@extends('layouts.main')

@section('container')
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
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center fs-4">No Services Found.</p>
        @endif
    </div>
@endsection
