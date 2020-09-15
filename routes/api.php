<?php

use App\Http\Controllers\Bank\Appcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bank\HistoriesController;
use App\Http\Controllers\Bank\TransactionsController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/histories', [HistoriesController::class, 'index']);
Route::post('/income', [TransactionsController::class, 'income']);
Route::post('/outgo', [TransactionsController::class, 'outgo']);
Route::get('/app', [AppController::class, 'index']);


