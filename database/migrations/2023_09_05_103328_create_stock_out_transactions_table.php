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
        Schema::create('stock_out_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->string('order_number');
            $table->dateTime('datetime');
            $table->double('quantity');
            $table->double('price');
            $table->double('value');
            $table->double('total_price');
            $table->double('initial_quantity');
            $table->double('initial_value');
            $table->double('new_quantity');
            $table->double('new_value');
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_out_transactions');
    }
};
