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
        Schema::create('especialidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facultad_id')->references('id')->on('facultades');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->char('codigo',10)->nullable();
            $table->char('cargo',50)->nullable();
            $table->char('escuela',50)->nullable();
            $table->string('nombre',250)->nullable();
            $table->string('nombre_completo',250)->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidades');
    }
};
