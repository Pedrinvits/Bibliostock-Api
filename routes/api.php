<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorController;

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