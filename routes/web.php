<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiotController;
use App\Http\Controllers\ChampionController;

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

Route::get('/home', [RiotController::class, 'index']);
Route::post('/search', [RiotController::class, 'searchPlayer']);

// Rotas para campeões
Route::get('/tabelaDeCampeoes', [ChampionController::class, 'index'])->name('champions.index');
Route::get('/criarCampeao', [ChampionController::class, 'create'])->name('champions.create');
Route::post('/gerarCampeao', [ChampionController::class, 'store'])->name('champions.store');
Route::delete('/champions/{id}', [ChampionController::class, 'destroy'])->name('champions.destroy');
Route::put('/champions/{id}', [ChampionController::class, 'update'])->name('champions.update');
Route::get('/champions/{id}/edit', [ChampionController::class, 'edit'])->name('champions.edit');

//campeao especifico
Route::get('/champions/page/{id}',  [RiotController::class, 'championPage'])->name('champions.show');