<?php

use Illuminate\Http\Request;
use App\Http\Requests\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/api/data', [DataController::class, 'store']);
