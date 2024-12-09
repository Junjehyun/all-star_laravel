<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('notices', function (Blueprint $table) {
            //
            // MySQL의 AFTER 키워드를 사용하여 컬럼 순서를 변경
            DB::statement("ALTER TABLE `notices` MODIFY COLUMN `like` BIGINT(20) UNSIGNED DEFAULT 0 AFTER `view`");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notices', function (Blueprint $table) {
            //
            // 롤백 시 기본 상태로 복구
            DB::statement("ALTER TABLE `notices` MODIFY COLUMN `like` BIGINT(20) UNSIGNED DEFAULT 0");
        });
    }
};
