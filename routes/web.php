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
Route::get('/home', Home::class);

// Booking process
Route::get('/booking-form/{id}', BookingForm::class);

// Transfer
Route::get('ground-transfer-service', [TransferController::class, 'groundTransfer'])->name('transer_service');
Route::get('ground-transfer-results/{route}', [TransferController::class, 'SearchResults'])->name('transfer_search');
Route::get('request-ground-transfer-service', [TransferController::class, 'showForm'])->name('transfer_request');
Route::post('submit-ground-transfer-service', [TransferController::class, 'submitForm'])->name('transfer_submit');
Route::post('confirm-transfer', [TransferController::class, 'confirm'])->name('confirm_transfer');

// New
Route::get('transfers', [TransferController::class, 'transfers'])->name('transfers');
Route::get('transfers-results/{route}', [TransferController::class, 'transfersResults'])->name('t-results');

// Administratio
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', Dashboard::class);
    Route::get('/bookings', Bookings::class);
    Route::get('/booking/{id}', ShowBooking::class);
    // Route::get('/project/{id}', ShowProject::class);
    // Route::get('/project-status', ProjectStatuses::class);
    // Route::get('/tasks', Tasks::class);
    // Route::get('/task-status', TaskStatuses::class);
    // Route::get('/users', Tasks::class);
});