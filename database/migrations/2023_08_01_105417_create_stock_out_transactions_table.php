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
            $table->unsignedBigInteger('item_id');
            $table->string('order_number');
            //$table->string('item_code');
            //$table->string('item_name');
            //$table->string('customer');
            //$table->string('stock_per_unit');
            $table->dateTime('datetime');
            $table->string('quantity');
            $table->string('price');
            $table->string('total_price');
            $table->string('notes');
            $table->string('status');
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
