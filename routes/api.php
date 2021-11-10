<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Authentication 
Route::prefix('user')->group(function () {
    Route::post('/register', [Api\UserController::class, 'register']);
    Route::post('/login', [Api\UserController::class, 'login']);

    // Lead
    Route::post('/save-lead', [Api\LeadController::class, 'saveLead']);
});

// User dashboard
Route::prefix('user')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [Api\UserController::class, 'profile']);
});

// Property
Route::prefix('property')->group(function () {
    Route::get('/properties', [Api\PropertyController::class, 'getProperties']);
    Route::get('/get-details', [Api\PropertyController::class, 'getDetails']);
    Route::post('/search', [Api\PropertyController::class, 'searchProperty']);
});

// Leads 
Route::prefix('lead')->group(function () {
    Route::post('/new-guest', [Api\LeadController::class, 'saveLeadGuest']);
});

// News letters
Route::prefix('newsletter')->group(function () {
    Route::post('/subscribe', [Api\NewsLetterController::class, 'save']);
});

Route::get('/', function () {
    dd('Welcome to remax.');
});
