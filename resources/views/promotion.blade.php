@extends('layouts.main')

@section('container')
    <h2 class="mt-3">Newest Promotions!</h2>
    @if ($promotions->count())
        {{-- Card --}}
        @foreach ($promotions as $promotion)
            <div class="row d-flex bg-dark text-white py-3 mt-4 rounded">
                <div class="col-md-3">
                    <div class="justify-content-start" style="width: 18rem;">
                        <img src="https://source.unsplash.com/230x370/?gym" class="rounded border border-secondary"
                            alt="...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="justify-content-end">
                        <h3>{{ $promotion->name }}</h3>
                        <p>{!! $promotion->descriptions !!}</p>
                    </div>
                    <h6 class="mb-2 text-secondary">{{ $promotion->created_at->diffForHumans() }}</h6>
                </div>
            </div>
        @endforeach
        {{-- Card --}}
    @else
        <p class="text-center fs-4">No Promotions Found.</p>
    @endif

@endsection
