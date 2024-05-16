<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AnakMiddleware;

Route::get('/',[AuthController::class,'login']);
Route::get('login',[AuthController::class,'AuthLogin'])->name('login')->middleware('guest');
Route::post('login',[AuthController::class,'AuthLogin']);
Route::get('logout',[AuthController::class,'logout']);
Route::get('forgot-password',[AuthController::class,'forgotpassword']);
Route::post('forgot-password',[AuthController::class,'PostForgotPassword']);
Route::get('reset/{token}',[AuthController::class,'reset']);
Route::post('reset/{token}',[AuthController::class,'PostReset']);





Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('admin/admin/list',[AdminController::class,'list']);
    Route::get('admin/admin/add',[AdminController::class,'add']);
    Route::post('admin/admin/add',[AdminController::class,'insert']);
    Route::get('admin/admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('admin/admin/edit/{id}',[AdminController::class,'update']);
    Route::get('admin/admin/delete/{id}',[AdminController::class,'delete']);


    Route::get('admin/anak/list',[AnakController::class,'list']);
    Route::get('admin/anak/add',[AnakController::class,'add']);
    Route::post('admin/anak/add',[AnakController::class,'insert']);
    Route::get('admin/anak/edit/{id}',[AnakController::class,'edit']);
    Route::post('admin/anak/edit/{id}',[AnakController::class,'update']);
    Route::get('admin/anak/delete/{id}',[AnakController::class,'delete']);


});

Route::middleware(AnakMiddleware::class)->group(function () {

    Route::get('anak/dashboard',[DashboardController::class,'dashboard']);


});
