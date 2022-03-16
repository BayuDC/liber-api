<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{book:id}', [BookController::class, 'show']);
Route::post('/book/', [BookController::class, 'store']);
Route::put('/book/{book:id}', [BookController::class, 'update']);
Route::delete('/book/{book:id}', [BookController::class, 'destroy']);

Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{genre:id}', [GenreController::class, 'show']);
Route::post('/genre/', [GenreController::class, 'store']);
Route::put('/genre/{genre:id}', [GenreController::class, 'update']);
Route::delete('/genre/{genre:id}', [GenreController::class, 'destroy']);
