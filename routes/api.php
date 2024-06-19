<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/desa', [APIController::class, 'index']);
Route::get('/desa/{id}', [APIController::class, 'show']);
Route::post('/desa', [APIController::class, 'store']);
Route::put('/desa/{id}', [APIController::class, 'update']);
Route::delete('/desa/{id}', [APIController::class, 'destroy']);