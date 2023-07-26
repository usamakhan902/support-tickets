<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;

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

Route::post('/userLogin', [AuthController::class, 'userLogin']);

Route::middleware('auth.bearer')->get('/unauthenticated', function () {
    return response()->json(['error' => 'Unauthenticated.'], 401);
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/create-ticket', [TicketsController::class, 'createTicket']);
    Route::post('/ticket-status', [TicketsController::class, 'statusUpdate']);
    Route::get('/ticket-list', [TicketsController::class, 'ticketlist']);
});
