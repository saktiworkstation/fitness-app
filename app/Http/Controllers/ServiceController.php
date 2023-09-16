<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service', [
            'title' => 'Services',
            'services' => Service::latest()->get()
        ]);
    }
}
