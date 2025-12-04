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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora');
            $table->string('tipo')->default('presencial');
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada', 'completada'])->default('pendiente');

            // CORRECCIÓN: Claves foráneas referenciando a las tablas en español.
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->foreignId('medico_id')->constrained('medicos')->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
