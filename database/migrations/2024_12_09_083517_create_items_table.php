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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); // 상품명
            $table->decimal('price', 10, 2); // 가격
            $table->string('size')->nullable(); // 사이즈 컬럼
            $table->text('description')->nullable(); // 설명
            $table->string('image')->nullable(); // 이미지
            $table->string('category', 50); // 카테고리
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
