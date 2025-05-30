<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pkls', function (Blueprint $table) {
            $table->integer('durasi')->nullable()->after('selesai');
        });
    }
    
    public function down()
    {
        Schema::table('pkls', function (Blueprint $table) {
            $table->dropColumn('durasi');
        });
    }
    
};
