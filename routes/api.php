<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PropertyController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Property
Route::prefix('property')->group(function () {
    Route::get('/properties', [PropertyController::class, 'getProperties']);
    Route::get('/get-details', [PropertyController::class, 'getDetails']);
});

Route::get('/', function () {
    dd('Working..');
});
