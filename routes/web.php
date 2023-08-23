<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages/index');
})->name('dashboard');

Route::get('/clients', function () {
    return view('pages/clients');
})->name('clients');

Route::get('/notation', function () {
    return view('pages/notation');
})->name('notation');

Route::get('/settings', function () {
    return view('pages/settings');
})->name('settings');

Route::get('/statistics', function () {
    return view('pages/statistics');
})->name('statistics');
