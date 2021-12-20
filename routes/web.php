<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PhonesImportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::group(['middleware' => ['auth']], function() {
    Route::resource('/phone', PhoneController::class)->except(['create', 'edit', 'show']);
    Route::get('/phone/get-phones', [PhoneController::class, 'getPhones'])->name('phone.getPhones');
    Route::get('/phone/one-phone/{id}', [PhoneController::class, 'onePhone'])->name('phone.onePhone');
});

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::resource('/client', ClientController::class)->except(['create', 'edit', 'show']);
    Route::get('/client/get-clients', [ClientController::class, 'getClients'])->name('client.getClients');
    Route::get('/client/one-client/{id}', [ClientController::class, 'oneClient'])->name('client.oneClient');
});

Route::group(['prefix' => '/phone-import', 'middleware' => ['auth']], function() {
    Route::get('/', [PhonesImportController::class, 'index'])->name('phoneImport.index');
    Route::post('/store', [PhonesImportController::class, 'store'])->name('phoneImport.store');
});
