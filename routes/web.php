<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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

// Route::get('/', [GameController::class, 'index'])->name('game.index');
// Route::get('/game/create', [GameController::class, 'create'])->name('game.create');
// Route::post('/game', [GameController::class, 'store'])->name('game.store');
// Route::get('/game/{game}', [GameController::class, 'show'])->name('game.show');
// Route::post('/game/{game}/play', [GameController::class, 'play'])->name('game.play');
