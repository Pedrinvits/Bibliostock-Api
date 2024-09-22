<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = Author::first();
        $genre = Genre::first();
        $publisher = Publisher::first();

        // Verifica se existem registros para os relacionamentos, caso contrário, cria exemplo
        if (!$author) {
            $author = Author::create([
                'name' => 'Autor Exemplo',
                'birth_year' => 1980,
                'gender' => 'Masculino',
                'nationality' => 'Brasileiro',
            ]);
        }

        if (!$genre) {
            $genre = Genre::create([
                'name' => 'Ficção Científica',
            ]);
        }

        if (!$publisher) {
            $publisher = Publisher::create([
                'name' => 'Editora Exemplo',
            ]);
        }

        // Criando um livro com as chaves estrangeiras associadas
        Book::create([
            'author_id' => $author->id,           // Relacionamento com autor
            'genre_id' => $genre->id,             // Relacionamento com gênero literário
            'publisher_id' => $publisher->id,     // Relacionamento com editora
            'title' => 'Livro Exemplo',
            'release_year' => 2021,               // Ano de lançamento
        ]);
    }
}
