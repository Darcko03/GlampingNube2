<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificarColumnasEnTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Modifica la columna 'subtotal' a decimal con precisión de 12 y escala de 4
            $table->decimal('subtotal', 12, 4)->change();
            
            // Modifica la columna 'discount' a decimal con precisión de 12 y escala de 4
            $table->decimal('discount', 12, 4)->change();
            
            // Modifica la columna 'tax' a decimal con precisión de 12 y escala de 4
            $table->decimal('tax', 12, 4)->change();
            
            // Modifica la columna 'total' a decimal con precisión de 12 y escala de 4
            $table->decimal('total', 12, 4)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // En el método 'down', puedes revertir los cambios si es necesario
        Schema::table('bookings', function (Blueprint $table) {
            // Por ejemplo, puedes volver a la precisión y escala originales
            $table->decimal('subtotal', 10, 2)->change();
            $table->decimal('discount', 10, 2)->change();
            $table->decimal('tax', 10, 2)->change();
            $table->decimal('total', 10, 2)->change();
        });
    }
}
