<?php

use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\CharacteristicController;
use App\Http\Controllers\Admin\CharacteristicValueController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ClientController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::controller(LoginController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('/a-login', 'create')->name('manager.login');
        Route::post('/a-login', 'store')->middleware(ProtectAgainstSpam::class);
    });


Route::controller(LoginController::class)
    ->middleware('auth')
    ->group(function () {
        Route::post('/a-logout', 'destroy')->name('manager.logout');
    });


Route::middleware('auth')
    ->prefix('/manager')
    ->name('manager.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('apps', AppController::class);
        Route::resource('types', TypeController::class)->except(['show']);
        Route::resource('characteristics', CharacteristicController::class)->except(['show']);
        Route::resource('characteristicValues', CharacteristicValueController::class);
        Route::resource('devices', DeviceController::class)->except(['show']);
        Route::resource('managers', ManagerController::class)->except(['show']);
        Route::resource('contacts', ContactController::class)->only(['index', 'destroy']);
        Route::resource('comments', CommentController::class)->only(['index', 'destroy']);
        Route::resource('clients', ClientController::class)->except(['create', 'store']);
    });