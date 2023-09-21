<?php

use App\Models\Domo;
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
        Schema::create('characteristic_domes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dome_id');
            $table->unsignedBigInteger('characteristic_id');
            $table->foreign('dome_id')->references('id')->on('domes')->onDelete('cascade');
            $table->foreign('characteristic_id')->references('id')->on('characteristics')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristic_domes');
    }
};
