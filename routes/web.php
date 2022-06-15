<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\ProvisionServer;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/server',ProvisionServer::class);

Route::get('/agencia/index', [AgenciaController::class, 'index'])->middleware(['auth', 'admin'])->name('agencia.index');
Route::post('/agencia/store',  [AgenciaController::class, 'store'])->middleware(['auth', 'admin'])->name('agencia.store');
Route::put('/agencia/{id}', [AgenciaController::class, 'update'])->middleware(['auth', 'admin'])->name('agencia.update');
Route::get('/agencia/create', [AgenciaController::class, 'create'])->middleware(['auth', 'admin'])->name('agencia.create');
Route::get('/agencia/{id}', [AgenciaController::class, 'show'])->middleware(['auth', 'admin'])->name('agencia.show');
Route::post('/agencia/store',  [AgenciaController::class, 'store'])->middleware(['auth', 'funcionario'])->name('agencia.store');
Route::put('/agencia/{id}', [AgenciaController::class, 'update'])->middleware(['auth', 'funcionario'])->name('agencia.update');
Route::get('/agencia/create', [AgenciaController::class, 'create'])->middleware(['auth', 'funcionario'])->name('agencia.create');
Route::get('/agencia/{id}', [AgenciaController::class, 'show'])->middleware(['auth', 'funcionario'])->name('agencia.show');
Route::get('/agencia/index', [AgenciaController::class, 'index'])->middleware(['auth', 'funcionario'])->name('agencia.index');
Route::get('/agencia/{id}', [AgenciaController::class, 'show'])->middleware(['auth', 'user'])->name('agencia.show');
Route::get('/agencia/index', [AgenciaController::class, 'index'])->middleware(['auth', 'user'])->name('agencia.index');


Route::get('/banco/index', [BancoController::class, 'index'])->middleware(['auth', 'admin'])->name('banco.index');
Route::post('/banco/store',  [BancoController::class, 'store'])->middleware(['auth', 'admin'])->name('banco.store');
Route::put('/banco/{id}', [BancoController::class, 'update'])->middleware(['auth', 'admin'])->name('banco.update');
Route::get('/banco/create', [BancoController::class, 'create'])->middleware(['auth', 'admin'])->name('banco.create');
Route::get('/banco/{id}', [BancoController::class, 'show'])->middleware(['auth', 'admin'])->name('banco.show');
Route::get('/banco/create', [BancoController::class, 'create'])->middleware(['auth', 'funcionario'])->name('banco.create');
Route::post('/banco/store',  [BancoController::class, 'store'])->middleware(['auth', 'funcionario'])->name('banco.store');
Route::put('/banco/{id}', [BancoController::class, 'update'])->middleware(['auth', 'funcionario'])->name('banco.update');
Route::get('/banco/index', [BancoController::class, 'index'])->middleware(['auth', 'funcionario'])->name('banco.index');
Route::get('/banco/{id}', [BancoController::class, 'show'])->middleware(['auth', 'funcionario'])->name('banco.show');

Route::get('/user/{id}', [UserController::class, 'show'])->middleware(['auth', 'admin'])->name('user.show');
Route::put('/user/{id}', [UserController::class, 'update'])->middleware(['auth', 'admin'])->name('user.update');
Route::get('profile', [UserController::class, 'show'])->middleware('auth', 'admin')->name('profile');
Route::get('/user/{id}', [UserController::class, 'show'])->middleware(['auth', 'funcionario'])->name('user.show');
Route::put('/user/{id}', [UserController::class, 'update'])->middleware(['auth', 'funcionario'])->name('user.update');
Route::get('profile', [UserController::class, 'show'])->middleware('auth', 'funcionario')->name('profile');
Route::get('/user/{id}', [UserController::class, 'show'])->middleware(['auth', 'user'])->name('user.show');
Route::get('profile', [UserController::class, 'show'])->middleware('auth', 'user')->name('profile');


Route::get('/', function () {
    return view('dashboard');
})->middleware('auth', 'user')->name('dashboard');

require __DIR__.'/auth.php';
