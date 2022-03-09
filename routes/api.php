<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\API\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::post('registrar', [AuthController::class, 'registrar']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    
    Route::get('produtos', [ProdutoController::class, 'index']);
    Route::get('produto/{id}/show', [ProdutoController::class, 'show']);
    Route::post('produto/adicionar-produtos', [ProdutoController::class, 'store']);

    // Route::put('produto/{id}/update', [ProdutoController::class, 'update']);
    Route::post('produto/{id}/update', [ProdutoController::class, 'update']);
    Route::delete('produto/{id}/delete', [ProdutoController::class, 'destroy']);

});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });