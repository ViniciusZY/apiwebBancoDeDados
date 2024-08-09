<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\UsuarioController;

Route::get('usuarios/{cpf}', [UsuarioController::class, 'showByCpf']);
Route::post('/usuarios', [UsuarioController::class, 'store'])->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);