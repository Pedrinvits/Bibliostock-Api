<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::getAllPublisher();

        return  response()->json([
            'status' => true,
            'publishers' => $publishers,
        ]);

    }

    public function show(Publisher $publisher)
    {
        return  response()->json([
            'status' => true,
            'book' => $publisher,
        ]);
    }

    public function store(PublisherRequest $request)
    {
        DB::beginTransaction();

        try {
            $publisher = Publisher::create([
                'name' => $request->name,
                'country' => $request->country,
            ]);

            DB::commit();
            return  response()->json([
                'status' => true,
                'publisher' => $publisher,
                'message' => 'publisher cadastrado com sucesso',
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'publisher nao cadastrado',
            ], 400);
        }
    }

    public function update(PublisherRequest $request, Publisher $publisher)
    {
        DB::beginTransaction();

        try {

            $publisher->update([
               'name' => $request->name,
               'country' => $request->country,
            ]);

            DB::commit();
            return  response()->json([
                'status' => true,
                'author' => $publisher,
                'message' => 'Editora editado com sucesso',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Editora nao editado',
            ], 400);
        }
        
    }

    public function destroy(Publisher $publisher)
    {
        DB::beginTransaction();

        try {

            $publisher->delete();

            DB::commit();
            return  response()->json([
                'status' => true,
                'author' => $publisher,
                'message' => 'Editora apagado com sucesso',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Editora nao apagado',
            ], 400);
        }
        
    }
}
