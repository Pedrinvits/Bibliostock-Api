<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;
use App\Models\Author;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index(): JsonResponse
    {
        $authors = Author::getAllAuthors();

        return  response()->json([
            'status' => true,
            'authors' => $authors,
        ]);
    }

    public function show(Author $author): JsonResponse
    {
        return  response()->json([
            'status' => true,
            'author' => $author,
        ]);
    }

    public function store(AuthorRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $author = Author::create([
                'name' => $request->name,
                'birth_year' => $request->birth_year,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
            ]);

            DB::commit();
            return  response()->json([
                'status' => true,
                'author' => $author,
                'message' => 'Autor cadastrado com sucesso',
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Autor nao cadastrado',
            ], 400);
        }
    }

    public function update(AuthorRequest $request, Author $author): JsonResponse
    {

        DB::beginTransaction();

        try {

            $author->update([
                'name' => $request->name,
                'birth_year' => $request->birth_year,
                'gender' => $request->gender,
                'nationality' => $request->nationality,
            ]);

            DB::commit();
            return  response()->json([
                'status' => true,
                'author' => $author,
                'message' => 'Autor editado com sucesso',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Autor nao editado',
            ], 400);
        }
    }

    public function destroy(Author $author): JsonResponse
    {

        DB::beginTransaction();

        try {

            $author->delete();

            DB::commit();
            return  response()->json([
                'status' => true,
                'author' => $author,
                'message' => 'Autor apagado com sucesso',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Autor nao apagado',
            ], 400);
        }
    }
}
