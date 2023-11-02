<?php

namespace App\Http\Controllers;

use App\Models\UserSubscription;
use Illuminate\Http\Request;

class DashboardUserSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(view('dashboard.userSubscription.index', [
            'userSubscriptions' => UserSubscription::latest()->get(),
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Response(view('dashboard.userSubscription.create', [
            'userSubscriptions' => UserSubscription::all()
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
        return Response();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSubscription  $userSubscription
     * @return \Illuminate\Http\Response
     */
    public function show(UserSubscription $userSubscription)
    {
        return Response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSubscription  $userSubscription
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSubscription $userSubscription)
    {
        return Response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserSubscription  $userSubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSubscription $userSubscription)
    {
        return Response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSubscription  $userSubscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSubscription $userSubscription)
    {
        return Response();
    }
}
