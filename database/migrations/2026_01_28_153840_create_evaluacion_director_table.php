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
        Schema::create('evaluacion_director', function (Blueprint $table) {
            $table->id();
            $table->string('periodo', 6);
            $table->string('facultad', 4);
            $table->string('programa_academico', 4);
            $table->string('docente_dni', 12);
            $table->string('nombre_docente', 255);
            $table->tinyInteger('planificacion')->unsigned();
            $table->tinyInteger('evaluacion')->unsigned();
            $table->tinyInteger('innovacion')->unsigned();
            $table->tinyInteger('responsabilidad')->unsigned();
            $table->string('plan_mejora')->nullable();
            $table->tinyInteger('total')->unsigned();
            $table->string('evaluador');
            $table->string('firma')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_director');
    }
};
