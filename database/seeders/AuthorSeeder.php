<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Autor Exemplo',
            'birth_year' => 1980,
            'gender' => 'M',
            'nationality' => 'Brasileiro',
        ]);
    }
}
