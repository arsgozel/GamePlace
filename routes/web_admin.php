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
use App\Http\Controllers\Admin\VisitorController;
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

        Route::controller(AppController::class)->prefix('apps')->name('apps.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{slug}', 'show')->name('show')->where('slug', '[A-Za-z0-9-]+');
                Route::post('', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(TypeController::class)->prefix('types')->name('types.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(DeviceController::class)->prefix('devices')->name('devices.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(ManagerController::class)->prefix('managers')->name('managers.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(ContactController::class)->prefix('contacts')->name('contacts.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(CommentController::class)->prefix('comments')->name('comments.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(ClientController::class)->prefix('clients')->name('clients.')
            ->group(function () {
                Route::get('', 'index')->name('index');
            });

        Route::controller(VisitorController::class)->prefix('visitors')->name('visitors.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });
    });