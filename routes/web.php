<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User;
// use App\Http\Livewire\Projects;
// use App\Http\Livewire\ShowProject;
// use App\Http\Livewire\ShowTask;
// use App\Http\Livewire\Tasks;
// use App\Http\Livewire\TrackingTime;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Route::get('/projects', Projects::class);
    // Route::get('/trackingtime', TrackingTime::class);
    // Route::get('/project/{id}', ShowProject::class);
    // Route::get('/project-status', ProjectStatuses::class);
    // Route::get('/tasks', Tasks::class);
    // Route::get('/task-status', TaskStatuses::class);
    // Route::get('/trackingtime/{id}', ShowTask::class);
    // Route::get('/users', Tasks::class);
});