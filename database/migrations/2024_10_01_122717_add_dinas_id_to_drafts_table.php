<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('drafts', function (Blueprint $table) {
            $table->unsignedBigInteger('dinas_id')->nullable(); // Menambahkan kolom dinas_id yang dapat bernilai null
    
            // Jika ada relasi dengan tabel dinas, tambahkan foreign key
            $table->foreign('dinas_id')->references('id')->on('dinas')->onDelete('cascade');
        });
    }
    
    public function down() {
        Schema::table('drafts', function (Blueprint $table) {
            $table->dropForeign(['dinas_id']); // Hapus foreign key jika ada
            $table->dropColumn('dinas_id'); // Hapus kolom dinas_id
        });
    }
};