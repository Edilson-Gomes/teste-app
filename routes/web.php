<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuerController;
use App\Http\Controllers\ProdutosController;
use App\Models\Produtos;
use Illuminate\Support\Facades\Route;

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

Route::view('/login', 'login')->name('login');

Route::view('/registro', 'cadastro_usuario');

Route::view('/produtos', 'cadastro_produtos');

Route::post('/auth', [LoginController::class,'auth'])->name('login.auth');

Route::post('/registro', [UsuerController::class,'store'])->name('registro.store');

Route::post('/produtos', [ProdutosController::class, 'store'])->name('produtos.store');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/', [ProdutosController::class,'index'])->name('produtos.index');

Route::get('/produto/{id}', [ProdutosController::class,'edit'])->name('produtos.edit');

Route::put('/produto/{id}', [ProdutosController::class,  'update'])->name('produtos.update');

Route::delete('/produto/{id}', [ProdutosController::class,'destroy'])->name('produtos.destroy');
