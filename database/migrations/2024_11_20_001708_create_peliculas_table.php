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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 100);
            $table->text('sinopsis');
            $table->enum('genero', [
                'Acción', 'Animación', 'Aventuras', 'Bélico', 'Biográfico', 'Ciencia ficción', 
                'Comedia', 'Documental', 'Drama', 'Erótico', 'Espionaje', 'Fantástico', 'Histórico', 
                'Mudo', 'Musical', 'Negro', 'Policíaco', 'Suspense', 'Terror', 'Thriller', 'Western'
            ])->nullable();
            $table->integer('duracion')->unsigned();
            $table->date('fecha');
            $table->string('link')->nullable();
            $table->enum('clasificacion', ['AA', 'A', 'B', 'B15', 'C', 'D'])->nullable();
            $table->string('idiomas')->nullable();
            $table->string('foto')->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
