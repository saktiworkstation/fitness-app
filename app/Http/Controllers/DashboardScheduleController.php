<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Schedule.index', [
            'schedules' => Schedule::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Schedule.create');
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
            'name' => 'required|max:255',
            'slug' => 'required|unique:schedules',
            'instructor' => 'required|max:255',
            'descriptions' => 'required'
        ]);

        Schedule::create($validatedData);

        return redirect('/dashboard/schedules')->with('success', 'Created new Schedule Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('dashboard.Schedule.edit', [
            'schedule' => $schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $rules = [
            'name' => 'required|max:255',
            'instructor' => 'required|max:255',
            'descriptions' => 'required'
        ];

        if ($request->slug != $schedule->slug) {
            $rules['slug'] = 'required|unique:schedules';
        }

        $validatedData = $request->validate($rules);

        Schedule::where('id', $schedule->id)->update($validatedData);

        return redirect('/dashboard/schedules')->with('success', 'Schedule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        Schedule::destroy($schedule->id);
        return redirect('/dashboard/schedules')->with('success', 'Schedule deleted successfully');
    }
}
