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
        Schema::create('notices', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->enum('category', ['low', 'common', 'high', 'emergency'])->default('common'); // 카테고리
            $table->string('title', 255); // 제목
            $table->text('content'); // 내용
            $table->string('author', 25); // 작성자
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
