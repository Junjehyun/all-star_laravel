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
            // 부모댓글 ID
            $table->unsignedBigInteger('parent_id')->nullable()->after('id');
            // 부모 댓글과 관계 설정
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            //
            // 외래키 삭제
            $table->dropForeign(['parent_id']);
            // 컬럼 삭제
            $table->dropColumn('parent_id');
        });
    }
};
