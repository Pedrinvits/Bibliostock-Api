<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained()->onDelete('cascade'); // Chave estrangeira para autores
            $table->foreignId('genre_id')->constrained()->onDelete('cascade'); // Chave estrangeira para gêneros
            $table->foreignId('publisher_id')->constrained()->onDelete('cascade'); // Chave estrangeira para editoras
            $table->string('title');
            $table->year('release_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
