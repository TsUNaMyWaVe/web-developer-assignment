<?php

use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'index']);

Route::get('/books/add', [BookController::class, 'add']);

Route::post('/books', [BookController::class, 'store']);

Route::get('/books/delete/{id}', [BookController::class, 'delete']);

Route::get('/books/author/{author}', [BookController::class, 'indexAuthor']);

Route::get('/books/author/{author}/edit', [BookController::class, 'editAuthor']);

Route::post('/author', [BookController::class, 'storeAuthor']);

Route::get('/export', [BookController::class, 'export']);