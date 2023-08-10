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
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('item_name');
            $table->string('item_unit');
            $table->string('item_transaction_code');
            $table->dateTime('item_transaction_date');
            $table->string('initial_quantity');
            $table->string('initial_value');
            $table->string('stock-in_quantity');
            $table->string('stock-in_value');
            $table->string('stock-out_quantity');
            $table->string('stock-out_value');
            $table->string('other_quantity');
            $table->string('other_value');
            $table->string('current_quantity');
            $table->string('current_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transactions');
    }
};
