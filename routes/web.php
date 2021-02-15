<?php

use  \App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
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

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/', [ServerController::class, 'index'])->name('server.index');

Route::get('/register', [UserController::class, 'registerView'])->name('auth.register');
Route::post('/register', [UserController::class, 'register'])->name('auth.register.post');

Route::get('/login', [UserController::class, 'loginView'])->name('auth.login');
Route::post('/login', [UserController::class, 'login'])->name('auth.login.post');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
