@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Subscriptions</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="/dashboard/user-subscriptions/create" class="btn btn-primary mb-3">Create new User Subscription</a>

    <div class="row justify-content-center">
        @if ($userSubscriptions->count())
            @foreach ($userSubscriptions as $subscription)
                <div class="card mx-2 my-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $subscription->member->name }}</h5>
                        <p class="card-text">Join At. {{ $subscription->created_at->diffForHumans() }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Free session : {{ $subscription->free_session }}</li>
                    </ul>
                    <div class="card-body d-flex justify-content-center">
                        <a href="#" class="card-link btn btn-primary my-2">Include
                            Subscription</a>
                        <a href="#" class="card-link btn btn-danger my-2">Delete
                            Subscription</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
