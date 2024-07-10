<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AnakMiddleware;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UkurController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\MeasurementController;




Route::get('/', [AuthController::class, 'login']);
Route::get('login', [AuthController::class, 'AuthLogin'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    Route::get('admin/anak/list', [AnakController::class, 'list']);
    Route::get('admin/anak/add', [AnakController::class, 'add']);
    Route::post('admin/anak/add', [AnakController::class, 'insert']);
    Route::get('admin/anak/edit/{id}', [AnakController::class, 'edit']);
    Route::post('admin/anak/edit/{id}', [AnakController::class, 'update']);
    Route::get('admin/anak/delete/{id}', [AnakController::class, 'delete']);

    Route::get('admin/ukur/list', [DataController::class, 'list']);
    Route::get('admin/ukur/add', [DataController::class, 'add']);
    Route::post('user/{id}/admin/ukur/add', [DataController::class, 'insert']);
    Route::get('admin/ukur/edit/{id}', [DataController::class, 'edit']);
    Route::post('admin/ukur/edit/{id}', [DataController::class, 'update']);
    Route::get('admin/ukur/delete/{id}', [DataController::class, 'delete']);

    Route::get('admin/hasil/list', [UkurController::class, 'list']);
    Route::get('admin/hasil/add', [UkurController::class, 'add']);
    Route::post('admin/hasil/add', [UkurController::class, 'insert']);
    Route::get('admin/hasil/edit/{id}', [UkurController::class, 'edit']);
    Route::post('admin/hasil/edit/{id}', [UkurController::class, 'update']);
    Route::get('admin/hasil/delete/{id}', [UkurController::class, 'delete']);

    Route::get('admin/measurements/create/{userId}', [MeasurementController::class, 'create'])->name('measurements.create');
    Route::post('admin/measurements/{userId}', [MeasurementController::class, 'store'])->name('measurements.store');
    Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');

    Route::get('admin/hasil/list', [UkurController::class, 'list'])->name('ukur.list');

});

Route::middleware(AnakMiddleware::class)->group(function () {
    Route::get('anak/dashboard', [DashboardController::class, 'dashboard']);
});


Route::post('/sensor-data', [SensorDataController::class, 'store']);
Route::get('/anak/{userId}/chart', 'App\Http\Controllers\MeasurementController@chart')->name('anak.chart');










