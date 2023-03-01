<?php


use App\Http\Controllers\Client\AppController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;


Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
        Route::get('/locale/{locale}', 'language')->name('language')->where('locale', '[a-z]+');
    });

Route::controller(AppController::class)
    ->prefix('/apps')
    ->name('apps.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{slug}', 'show')->name('show')->where('slug', '[A-Za-z0-9-]+');
    });

Route::controller(ContactController::class)
    ->prefix('/contacts')
    ->name('contacts.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('', 'store')->name('store');
    });
