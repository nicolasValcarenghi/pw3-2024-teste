<?php

use App\Http\Controllers\AnimaisController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
})->name('index');

Route::get('/animais', [AnimaisController::class, 'index'])->name('animais');

Route::get('/animais/cadastrar', [AnimaisController::class, 'cadastrar'])->name('animais.cadastrar');

Route::post('/animais/cadastrar', [AnimaisController::class, 'gravar'])->name('animais.gravar');

Route::get('/animais/apagar/{animal}', [AnimaisController::class, 'apagar'])->name('animais.apagar');

Route::delete('/animais/apagar/{animal}', [AnimaisController::class, 'deletar']);

Route::prefix('usuarios')->middleware('auth')->group(function () {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');

    Route::get('/inserir', [UsuariosController::class, 'create'])->name('usuarios.inserir');

    Route::post('/inserir', [UsuariosController::class, 'insert'])->name('usuarios.gravar');

    Route::get('/apagar/{usuario}', [UsuariosController::class, 'remove'])->name('usuarios.apagar');
});

Route::get('login', [UsuariosController::class, 'login'])->name('login');

Route::post('login', [UsuariosController::class, 'login']);

Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');
