<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/cadastro', [AuthController::class, 'cadastro']);
Route::get('/verificar-email', [AuthController::class, 'verificarEmail']);

Route::post('/esqueci-senha', [AuthController::class, 'esqueciSenha']);
Route::post('/redefinir-senha', [AuthController::class, 'redefinirSenha']);