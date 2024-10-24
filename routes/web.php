<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/cadastro_usuario', [UserController::class, "formCriarUsuario"]);
Route::get('/listar_usuarios', [UserController::class, 'listar']);
Route::post('/criar_usuario', [UserController::class, 'criar']);
Route::delete("/deletar_usuario/{id}", [UserController::class, 'deletar']);
Route::get("/editar_usuario/{id}", [UserController::class, 'formEditarUsuario']);
Route::put("/editar_usuario/{id}", [UserController::class, 'editar']);

// Rotas produto
Route::get('/cadastro_produto', [ProdutoController::class, "formCriarProduto"]);
Route::post('/criar_produto', [ProdutoController::class, 'criar']);
Route::get('/listar_produtos', [ProdutoController::class, 'listar']);
Route::delete("/deletar_produto/{id}", [ProdutoController::class, 'deletar']);

// App
Route::get('/', [AppController::class, 'inicial']);

// pedido

Route::get('/cadastro_pedido', [PedidoController::class, 'formCadastrarPedido']);
Route::post('/cadastrar_pedido', [PedidoController::class, 'cadastrar']);
Route::get('/listar_pedidos', [PedidoController::class, 'listar']);
Route::delete("/deletar_pedido/{id}", [PedidoController::class, 'deletar']);