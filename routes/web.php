<?php

use App\Models\User;
use App\Http\Controllers\Promotion;
use App\Models\SubscriptionPackage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WorkoutHistoryController;
use App\Http\Controllers\DashboardServiceController;
use App\Http\Controllers\DashboardScheduleController;
use App\Http\Controllers\DashboardSubscriptionPackageController;
use App\Http\Controllers\DashboardWorkoutHistoryController;
use App\Http\Controllers\DashboardUserSubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
    ]);
});

Route::get('/promotions', [Promotion::class, 'index']);

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'users' => User::all()
    ]);
})->middleware('auth');

Route::resource('dashboard/schedules', DashboardScheduleController::class)->middleware('auth');

Route::resource('dashboard/promotions', DashboardSubscriptionPackageController::class)->middleware('auth');

Route::resource('dashboard/services', DashboardServiceController::class)->middleware('auth');

Route::resource('dashboard/user-subscriptions', DashboardUserSubscriptionController::class)->middleware('auth')->middleware('admin');

Route::resource('dashboard/absentions', DashboardWorkoutHistoryController::class)->middleware('auth')->middleware('admin');

Route::get('dashboard/training-histories', [WorkoutHistoryController::class, 'index'])->middleware('auth');
