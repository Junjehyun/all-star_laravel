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
        Schema::table('comments', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('item_id'); // 아이템과 연결되는 외래 키
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade'); // 아이템 테이블과 외래 키 관계 설정
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            //
            $table->dropForeign(['item_id']); // 외래 키 제거
            $table->dropColumn('item_id'); // 컬럼 제거
        });
    }
};
