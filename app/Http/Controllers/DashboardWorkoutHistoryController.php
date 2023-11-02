<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\WorkoutHistory;
use App\Models\UserSubscription;

class DashboardWorkoutHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(view('dashboard.absention.index', [
            'workoutHistories' => WorkoutHistory::latest()->get(),
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Response(view('dashboard.absention.create', [
            'subscriptions' => UserSubscription::all(),
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
        ]);

        $data = UserSubscription::where('user_id', $request['user_id'])->get();
        foreach ($data as $data) {
            $data = $data->free_session;
        }

        $newData = $data - 1;

        UserSubscription::where('user_id', $request['user_id'])->update(['free_session' => $newData]);

        WorkoutHistory::create($validatedData);

        return redirect('/dashboard/absentions')->with('success', 'Absent Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkoutHistory  $workoutHistory
     * @return \Illuminate\Http\Response
     */
    public function show(WorkoutHistory $workoutHistory)
    {
        return Response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkoutHistory  $workoutHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkoutHistory $workoutHistory)
    {
        return Response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkoutHistory  $workoutHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkoutHistory $workoutHistory)
    {
        return Response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkoutHistory  $workoutHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkoutHistory $workoutHistory)
    {
        return Response();
    }
}
