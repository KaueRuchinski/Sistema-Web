<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\ProdutoController;
use App\Models\Atendimento;
use App\Models\Gasto;

/*
|--------------------------------------------------------------------------
| PÁGINA INICIAL (LIVRE)
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])
    ->middleware('auth')
    ->name('home');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ADMIN (SÓ AQUI É PROTEGIDO)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', function () {

    $entradas = Atendimento::sum('valor');
    $saidas = Gasto::sum('valor');
    $lucro = $entradas - $saidas;

    $atendimentos = Atendimento::latest()->take(5)->get();

    return view('admin.dashboard', compact('entradas', 'saidas', 'lucro', 'atendimentos'));

})->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

});

/*
|--------------------------------------------------------------------------
| ROTAS LIVRES (ATENDENTE / LOJA)
|--------------------------------------------------------------------------
*/

Route::get('/atendimentos', [AtendimentoController::class, 'index']);
Route::post('/atendimentos', [AtendimentoController::class, 'store']);
Route::get('/atendimentos/{id}/edit', [AtendimentoController::class, 'edit']);
Route::put('/atendimentos/{id}', [AtendimentoController::class, 'update']);

Route::get('/gastos', [GastoController::class, 'index']);
Route::post('/gastos', [GastoController::class, 'store']);
Route::get('/gastos/{id}/edit', [GastoController::class, 'edit']);
Route::put('/gastos/{id}', [GastoController::class, 'update']);

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);