<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\PublisherController;
// Route::get('/users', function (Request $request) {
//     return  response()->json([
//         'status' => true,
//         'message' => "Listar",
//     ]);
// });

Route::get('/authors', [AuthorController::class,'index']);
Route::get('/authors/{author}', [AuthorController::class,'show']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::put('/authors/{author}', [AuthorController::class, 'update']);
Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);

Route::get('/books', [BookController::class,'index']);
Route::get('/books/{book}', [BookController::class,'show']);
Route::post('/books', [BookController::class, 'store']);
Route::put('/books/{book}', [BookController::class, 'update']);
Route::delete('/books/{book}', [BookController::class, 'destroy']);

Route::get('/genres', [GenreController::class,'index']);
Route::get('/genres/{genre}', [GenreController::class,'show']);
Route::post('/genres', [GenreController::class, 'store']);
Route::put('/genres/{genre}', [GenreController::class, 'update']);
Route::delete('/genres/{genre}', [GenreController::class, 'destroy']);

Route::get('/publishers', [PublisherController::class,'index']);
Route::get('/publishers/{publisher}', [PublisherController::class,'show']);
Route::post('/publishers', [PublisherController::class, 'store']);
Route::put('/publishers/{publisher}', [PublisherController::class, 'update']);
Route::delete('/publishers/{publisher}', [PublisherController::class, 'destroy']);