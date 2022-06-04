<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User;
use App\Http\Controllers\TransferController;
use App\Http\Livewire\Bookings;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ShowBooking;
use App\Http\Livewire\Home;
use App\Http\Livewire\BookingForm;
use App\Http\Livewire\BookingDetails;
// use App\Http\Livewire\ProjectStatuses;
// use App\Http\Livewire\TaskStatuses;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/', [HomeController::class, 'home'])->name('home');
// Route::get('/', Home::class);
Route::get('/', Home::class);

// Booking process
Route::get('/booking-form/{id}', BookingForm::class);
Route::get('/booking-details/{id}', BookingDetails::class);
// Route::get('/booking-details/{id}', [TransferController::class, 'show'])->name('booking-details');
Route::patch('/booking/{id}', [TransferController::class, 'update'])->name('booking-update');


Route::post('booking/oneway', [TransferController::class, 'oneway'])->name('transer_oneway');
Route::post('booking/roundtrip', [TransferController::class, 'roundtrip'])->name('transer_roundtrip');

// Administratio
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class);
    Route::get('/bookings', Bookings::class);
    Route::get('/booking/{id}', ShowBooking::class);
    // Route::get('/project/{id}', ShowProject::class);
    // Route::get('/project-status', ProjectStatuses::class);
    // Route::get('/tasks', Tasks::class);
    // Route::get('/task-status', TaskStatuses::class);
    // Route::get('/users', Tasks::class);
});