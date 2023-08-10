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
        Schema::create('stock_in_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('stock_in_order_id');
            $table->string('item_code');
            $table->string('item_name');
            $table->string('supplier');
            $table->dateTime('stock_in_date');
            $table->string('stock_in_quantity');
            $table->string('stock_in_price');
            $table->string('total_price');
            $table->string('stock_in_notes');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_in_transactions');
    }
};
