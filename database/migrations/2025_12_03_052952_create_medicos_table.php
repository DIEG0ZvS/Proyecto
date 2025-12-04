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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('num_colegiatura')->unique();
            $table->string('ubicacion');
            $table->string('telefono')->nullable();
            
            // Claves foráneas (fusionadas y corregidas):
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // CORRECCIÓN CRUCIAL: 'specialties' a 'especialidades'
            $table->foreignId('especialidad_id')->constrained('especialidades')->onDelete('cascade'); 
            
            // CORRECCIÓN PROBABLE: 'health_centers' a 'centros' (basado en el nombre de tu archivo create_centros_table.php)
            $table->foreignId('centro_salud_id')->nullable()->constrained('centros')->onDelete('set null');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
