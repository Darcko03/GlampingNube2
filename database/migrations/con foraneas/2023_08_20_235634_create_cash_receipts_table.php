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
        Schema::create('cash_receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->decimal('subtotal');
            $table->decimal('discount');
            $table->decimal('tax');
            $table->decimal('total');
            $table->date('receipt_date');
            $table->unsignedBigInteger('payment_method');



            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('payment_method')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_receipts');
    }
};
