<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

Route::get('/server/{id}', [ServerController::class, 'show'])->name('server.show');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('cp')->middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/account',[AccountController::class,'index'])->name('account');
    Route::post('/account/changeUsername',[AccountController::class,'changeUsername'])->name('account.update.username');
    Route::post('/account/changePassword',[AccountController::class,'changePassword'])->name('account.update.password');


    Route::get('/',[ServerController::class,'serverList'])->name('server.list');

    Route::get('/add',[ServerController::class,'serverCreate'])->name('server.create');
    Route::post('/add',[ServerController::class,'serverStore'])->name('server.store');

    Route::get('/edit/{id}',[ServerController::class,'serverEdit'])->name('server.edit');
    Route::post('/edit/{id}',[ServerController::class,'serverUpdate'])->name('server.update');

    Route::get('/delete/{server_id}',[ServerController::class,'serverDelete'])->name('server.delete');
});
