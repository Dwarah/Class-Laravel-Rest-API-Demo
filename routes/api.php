<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('employees',[ApiController::class, 'listEmployees']);
Route::get('employees/{id}',[ApiController::class, 'singleEmployee']);
Route::POST('employees',[ApiController::class, 'createEmployee']);
Route::PUT('employees/{id}',[ApiController::class, 'updateEmployee']);
Route::delete('employees/{id}',[ApiController::class, 'deleteEmployee']);