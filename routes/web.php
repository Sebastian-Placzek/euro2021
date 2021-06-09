<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\matchesController;
use App\Http\Controllers\BetController;
use App\Http\Controllers\AdminPanelController;
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

Route::middleware(['web','checkStatus'])
    ->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/matches', [App\Http\Controllers\matchesController::class, 'showAvailableMatches'])->name('matches');
    Route::get('/scoredmatches', [App\Http\Controllers\matchesController::class, 'showScoredMatches'])->name('scoredMatches');

    Route::get('/bet', [App\Http\Controllers\matchesController::class, 'bet'])->name('bet');

    Route::get('/editBet', [App\Http\Controllers\BetController::class, 'editBet'])->name('editBet');
    Route::post('/addBet', [App\Http\Controllers\BetController::class, 'addBet'])->name('addBet');
    Route::post('/updateBet', [App\Http\Controllers\BetController::class, 'updateBet'])->name('updateBet');
    Route::get('/mybets', [App\Http\Controllers\BetController::class, 'showActiveBets'])->name('showBets');
    Route::get('/closedBets', [App\Http\Controllers\BetController::class, 'showClosedBets'])->name('closedBets');
    Route::get('/scoreboard', [App\Http\Controllers\BetController::class, 'scoreboard'])->name('scoreboard');
    Route::get('/showUserBets', [App\Http\Controllers\BetController::class, 'showUserBets'])->name('showUserBets');
    Route::get('/matchBets', [App\Http\Controllers\BetController::class, 'matchBets'])->name('matchBets');

    Route::get('/adminpanel',[App\Http\Controllers\AdminPanelController::class,'showAdminPanel'])->name('showAdminPanel');

    Route::get('/closedmatches', [App\Http\Controllers\matchesController::class, 'showClosedMatches'])->name('closedMatches');
    Route::get('/setResult', [App\Http\Controllers\matchesController::class, 'setResult'])->name('setResult');
    Route::post('/updateMatch', [App\Http\Controllers\matchesController::class, 'updateMatch'])->name('updateMatch');
    Route::get('/deleteScore', [App\Http\Controllers\matchesController::class, 'deleteScore'])->name('deleteScore');
    Route::get('/showAddMatch', [App\Http\Controllers\matchesController::class, 'showAddMatch'])->name('showAddMatch');
    Route::post('/addMatch', [App\Http\Controllers\matchesController::class, 'addMatch'])->name('addMatch');

    });
