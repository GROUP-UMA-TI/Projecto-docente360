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
        Schema::create('submodulos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modulo_id')->references('id')->on('modulos');
            $table->string('nombre');
            $table->string('codigo')->unique();
            $table->text('icono')->nullable();
            $table->char('estado', 1)->default('A')->comment('A: Activo | I :Inactivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submodulos');
    }
};
