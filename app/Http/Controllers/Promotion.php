<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPackage;

class Promotion extends Controller
{
    public function index()
    {
        return view('promotion', [
            'title' => 'Promotions',
            'promotions' => SubscriptionPackage::latest()->get(),
        ]);
    }
}
