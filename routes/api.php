<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/me', function () {
        return response()->json(['nice' => 'day']);
    });
   
});

