<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutHistory;

class WorkoutHistoryController extends Controller
{
    public function index()
    {
        return view('dashboard.workoutHistory.index', [
            'workoutHistories' => WorkoutHistory::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
