<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::getAllBooks();

        return  response()->json([
            'status' => true,
            'books' => $books,
        ]);

    }

    public function show(Book $book)
    {

        return  response()->json([
            'status' => true,
            'book' => $book,
        ]);
    }

    public function store(BookRequest $request)
    {
        DB::beginTransaction();

        try {
            $book = Book::create([
                'author_id' => $request->author_id,
                'genre_id' => $request->genre_id,
                'publisher_id' => $request->publisher_id,
                'title' => $request->title,
                'release_year' => $request->release_year,
            ]);

            DB::commit();
            return  response()->json([
                'status' => true,
                'book_name' => $book,
                'message' => 'Livro cadastrado com sucesso',
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Livro nao cadastrado',
            ], 400);
        }
    }

    public function update(BookRequest $request, Book $book)
    {
        DB::beginTransaction();

        try {

            $book->update([
               'author_id' => $request->author_id,
                'genre_id' => $request->genre_id,
                'publisher_id' => $request->publisher_id,
                'title' => $request->title,
                'release_year' => $request->release_year,
            ]);

            DB::commit();
            return  response()->json([
                'status' => true,
                'author' => $book,
                'message' => 'Livro editado com sucesso',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Livro nao editado',
            ], 400);
        }
        
    }

    public function destroy(Book $book)
    {

        DB::beginTransaction();

        try {

            $book->delete();

            DB::commit();
            return  response()->json([
                'status' => true,
                'author' => $book,
                'message' => 'Livro apagado com sucesso',
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return  response()->json([
                'status' => false,
                'message' => 'Livro nao apagado',
            ], 400);
        }
    }
}
