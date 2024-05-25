<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PassController;
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
    return view('welcome');
});
Route::get('/auth', [AuthController::class, 'authForm']);
Route::post('/auth', [AuthController::class, 'auth']);

Route::get('/password/{hash}', [AuthController::class, 'passForm'])->name('password');
Route::post('/password/{hash}', [AuthController::class, 'pass']);

