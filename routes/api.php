<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//User
Route::prefix('user')->group(function () {
    Route::post('/register', [Api\UserController::class, 'register']);
    Route::post('/login', [Api\UserController::class, 'login']);
});

// Property
Route::prefix('property')->group(function () {
    Route::get('/properties', [Api\PropertyController::class, 'getProperties']);
    Route::get('/get-details', [Api\PropertyController::class, 'getDetails']);
    Route::post('/search', [Api\PropertyController::class, 'searchProperty']);
});

Route::get('/', function () {
    dd('Working..');
});
