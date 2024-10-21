<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MonitoringController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/metrics', [MonitoringController::class, 'fetchMetrics']);


Auth::routes();
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('applications', ApplicationController::class)->names('admin.applications');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
