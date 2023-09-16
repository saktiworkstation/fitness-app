@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Training History</h1>
    </div>
    <div class="table-responsive col-lg-6">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Time In</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workoutHistories as $workoutHistory)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $workoutHistory->member->name }}</td>
                        <td>{{ $workoutHistory->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
