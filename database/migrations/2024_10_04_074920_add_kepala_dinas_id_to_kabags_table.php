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
    public function up()
    {
        Schema::table('kabags', function (Blueprint $table) {
            $table->unsignedBigInteger('kepala_dinas_id')->nullable(); // tambahkan kolom kepala_dinas_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kabags', function (Blueprint $table) {
            //
        });
    }
};