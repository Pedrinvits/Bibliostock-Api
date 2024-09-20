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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome do autor
            $table->year('birth_year'); // Ano de nascimento
            $table->enum('gender', ['M', 'F', 'O']); // Sexo (Masculino, Feminino, Outro)
            $table->string('nationality'); // Nacionalidade
            $table->timestamps(); // Campos para created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
