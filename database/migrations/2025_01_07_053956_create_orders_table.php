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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id'); // 주문 상품
            $table->unsignedBigInteger('user_id')->nullable(); // 사용자 ID (로그인 연동시)
            $table->string('status')->default('pending'); // 주문 상태 pending, completed, failed
            $table->decimal('amount', 10, 2); // 결제금액
            $table->string('payment_id')->nullable(); // Stripe 결제 ID
            $table->timestamps(); // 히즈케

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
