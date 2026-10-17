<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PerfilController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::post('/login', [AuthController::class, 'login']);
Route::post('/cadastro', [AuthController::class, 'cadastro']);
Route::get('/verificar-email', [AuthController::class, 'verificarEmail']);

Route::post('/esqueci-senha', [AuthController::class, 'esqueciSenha']);
Route::post('/redefinir-senha', [AuthController::class, 'redefinirSenha']);

// Rotas protegidas: exigem token (RN-01 e RNF-03)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::match(['put', 'patch'], '/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

    // RF-007: Perfil de Usuário
    Route::get('/perfil', [PerfilController::class, 'show']);
    Route::post('/perfil', [PerfilController::class, 'update']); // aceita arquivos (foto de perfil e capa)
    Route::match(['put', 'patch'], '/perfil', [PerfilController::class, 'update']);
});