<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\TicketsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', function () {
    return view('admin.pages.auth.login');
})->name('login');


// protected routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // tickets route
    Route::get('/tickets', [TicketsController::class, 'index'])->name('admin.tickets');
    Route::get('/tickets-view/{id}', [TicketsController::class, 'view'])->name('ticket.view');

    Route::post('/create-comment', [TicketsController::class, 'create_comment'])->name('create_comment');
    Route::post('/update-status', [TicketsController::class, 'updateStatus'])->name('updateStatus');
});


Route::post('/adminlogin', [AuthController::class, 'login'])->name('admin.login');
