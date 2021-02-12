<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/transactionWallet/{id}',[App\Http\Controllers\TransactionController::class, 'edit']);
Route::post('/transaction/{id}',[App\Http\Controllers\DepositeController::class, 'edit']);
Route::get('/transactions/{id}', [App\Http\Controllers\TransactionController::class, 'show']);
Route::get('/deposites/{id}', [App\Http\Controllers\DepositeController::class, 'show']);

Route::get('/deposite/{id}', [App\Http\Controllers\DepositeController::class, 'createDep']);