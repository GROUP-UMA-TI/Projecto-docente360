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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->string('periodo', 20);
            $table->string('facultad', 4);
            $table->string('programa_academico', 4);

            $table->string('curso_codigo', 50);
            $table->string('curso_nombre', 255);

            $table->string('docente_dni', 20);
            $table->string('docente_nombre', 255);

            $table->string('evaluador', 255);
            $table->string('semana', 20);
            $table->string('tema', 255);

            /* Puntajes – precisión controlada */
            $table->decimal('inicio1', 5, 2)->nullable();
            $table->decimal('inicio2', 5, 2)->nullable();
            $table->decimal('inicio3', 5, 2)->nullable();

            $table->decimal('desarrollo1', 5, 2)->nullable();
            $table->decimal('desarrollo2', 5, 2)->nullable();
            $table->decimal('desarrollo3', 5, 2)->nullable();
            $table->decimal('desarrollo4', 5, 2)->nullable();

            $table->decimal('cierre1', 5, 2)->nullable();
            $table->decimal('cierre2', 5, 2)->nullable();
            $table->decimal('cierre3', 5, 2)->nullable();

            $table->decimal('otros', 5, 2)->nullable();
            $table->decimal('total', 6, 2)->nullable();

            $table->string('firma')->nullable();
            $table->text('plan_mejora')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};
