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
            $table->string('periodo');
            $table->string('facultad');
            $table->string('programa_academico');
            $table->string('curso_codigo');
            $table->string('curso_nombre');
            $table->string('docente_dni');
            $table->string('docente_nombre');
            $table->string('evaluador');
            $table->string('semana');
            $table->string('tema');
            $table->double('inicio1')->nullable();
            $table->double('inicio2')->nullable();
            $table->double('inicio3')->nullable();
            $table->double('desarrollo1')->nullable();
            $table->double('desarrollo2')->nullable();
            $table->double('desarrollo3')->nullable();
            $table->double('desarrollo4')->nullable();
            $table->double('cierre1')->nullable();
            $table->double('cierre2')->nullable();
            $table->double('cierre3')->nullable();
            $table->double('otros')->nullable();
            $table->double('total')->nullable();
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
