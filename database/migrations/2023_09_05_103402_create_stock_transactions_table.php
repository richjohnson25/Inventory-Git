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
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('transaction_id');
            //$table->string('item_transaction_code');
            //$table->dateTime('item_transaction_date');
            $table->double('initial_quantity');
            $table->double('initial_value');
            $table->double('stock-in_quantity');
            $table->double('stock-in_value');
            $table->double('stock-out_quantity');
            $table->double('stock-out_value');
            $table->double('other_quantity');
            $table->double('other_value');
            $table->double('current_quantity');
            $table->double('current_value');
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
