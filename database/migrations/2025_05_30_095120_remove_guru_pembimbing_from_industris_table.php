<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('industris', function (Blueprint $table) {
            $table->dropColumn('guru_pembimbing');
        });
    }

    public function down(): void
    {
        Schema::table('industris', function (Blueprint $table) {
            $table->string('guru_pembimbing')->nullable();
        });
    }
};
