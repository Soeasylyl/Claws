<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotationsController;
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

Route::get('/', [DashboardController::class, 'getDataClientsRecords'])->name('dashboard');

Route::prefix('clients')->group(function (){
    Route::get('/', [ClientsController::class, 'getDataClients'])->name('clients');
    Route::post('/add', [ClientsController::class, 'addClient'])->name('client.add');
    Route::patch('/{id}/update',[ClientsController::class, 'updateClient'])->name('client.update');
    Route::delete('/{id}/delete',[ClientsController::class,'deleteClient'])->name('client.delete');
    Route::get('/search',[ClientsController::class, 'searchClient'])->name('clients.search');
});

Route::get('/notation', [NotationsController::class, 'getDataNotations'])->name('notation');

Route::get('/settings', function () {
    return view('pages/settings');
})->name('settings');

Route::get('/statistics', function () {
    return view('pages/statistics');
})->name('statistics');

