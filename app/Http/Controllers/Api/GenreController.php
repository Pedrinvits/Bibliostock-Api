<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use Illuminate\Http\Request;
use App\Models\Genre;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function index()
    {
       
        $genres = Genre::getAllGenre();

        return  response()->json([
            'status' => true,
            'genre' => $genres,
        ]);
    }

    public function show(Genre $genre)
    {
        return  response()->json([
            'status' => true,
            'genre' => $genre,
        ]);
    }

    public function store(GenreRequest $request)
    {
       
        DB::beginTransaction();

        try {
            $genre = Genre::create([
                'name' => $request->name,
            ]);

            DB::commit();
            return  response()->json([
                'status' => true,
                'genre_name' => $genre,
                'message' => 'Genrero cadastrado com sucesso',
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Genrero nao cadastrado',
            ], 400);
        }
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        DB::beginTransaction();

        try {

            $genre->update([
               'name' => $request->name,
            ]);

            DB::commit();
            return  response()->json([
                'status' => true,
                'author' => $genre,
                'message' => 'Genero editado com sucesso',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Genero nao editado',
            ], 400);
        }
        
    }

    public function destroy(Genre $genre)
    {

        DB::beginTransaction();

        try {

            $genre->delete();

            DB::commit();
            return  response()->json([
                'status' => true,
                'author' => $genre,
                'message' => 'genero apagado com sucesso',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'genero nao apagado',
            ], 400);
        }
    }
}
