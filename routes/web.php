<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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


Route::get('/', [TodoController::class, 'index'])->name('todo.init');
Route::post('/todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::get('/todo/update', [TodoController::class, 'edit'])->name('todo.edit');
Route::post('/todo/update', [TodoController::class, 'update'])->name('todo.update');
Route::get('/todo/delete/{id?}', [TodoController::class, 'delete'])->name('todo.delete');
Route::post('/todo/delete/{id?}', [TodoController::class, 'remove'])->name('todo.remove');