<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\matchesController;
use App\Http\Controllers\BetController;
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

Route::get('/hello', [HelloController::class,'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/matches', [App\Http\Controllers\matchesController::class, 'showAvailableMatches'])->name('matches');

Route::get('/bet', [App\Http\Controllers\matchesController::class, 'bet'])->name('bet');
Route::get('/editBet', [App\Http\Controllers\BetController::class, 'editBet'])->name('editBet');

Route::post('/addBet', [App\Http\Controllers\BetController::class, 'addBet'])->name('addBet');
Route::post('/updateBet', [App\Http\Controllers\BetController::class, 'updateBet'])->name('updateBet');
Route::get('/mybets', [App\Http\Controllers\BetController::class, 'showBets'])->name('showBets');
