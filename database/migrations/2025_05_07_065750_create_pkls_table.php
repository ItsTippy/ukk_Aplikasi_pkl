<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePklsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pkls', function (Blueprint $table) {
            $table->id();
            // foreign key ke tabel siswas
            $table->foreignId('siswa_id')
                  ->constrained('siswas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            // foreign key ke tabel industris
            $table->foreignId('industri_id')
                  ->constrained('industris')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            // foreign key ke tabel gurus
            $table->foreignId('guru_id')
                  ->constrained('gurus')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            // tanggal mulai dan selesai PKL
            $table->date('mulai');
            $table->date('selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pkls', function (Blueprint $table) {
            // drop foreign keys dulu
            $table->dropForeign(['siswa_id']);
            $table->dropForeign(['industri_id']);
            $table->dropForeign(['guru_id']);
        });
        Schema::dropIfExists('pkls');
    }
}
