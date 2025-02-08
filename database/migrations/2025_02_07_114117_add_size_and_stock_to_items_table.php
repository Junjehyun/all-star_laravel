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
        Schema::table('items', function (Blueprint $table) {
            //
            $table->integer('stock_s')->default(100);
            $table->integer('stock_m')->default(100);
            $table->integer('stock_l')->default(100);
            $table->integer('stock_xl')->default(100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            //
            $table->dropColumn(['stock_s', 'stock_m', 'stock_l', 'stock_xl']);
        });
    }
};
