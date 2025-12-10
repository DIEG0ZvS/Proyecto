<?php

// Contenido esperado en la migración add_user_id_to_centros_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('centros', function (Blueprint $table) {
            // Añade la columna `user_id` como nullable para evitar errores
            // si ya existen registros en la tabla `centros`.
            $table->foreignId('user_id')->nullable()->constrained()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('centros', function (Blueprint $table) {
            $table->dropForeign(['user_id']); 
            $table->dropColumn('user_id'); 
        });
    }
};