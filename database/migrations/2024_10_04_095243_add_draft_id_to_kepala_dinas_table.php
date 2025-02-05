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
    Schema::table('kepala_dinas', function (Blueprint $table) {
        $table->unsignedBigInteger('draft_id')->nullable()->after('id');
        $table->foreign('draft_id')->references('id')->on('drafts')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('kepala_dinas', function (Blueprint $table) {
        $table->dropForeign(['draft_id']);
        $table->dropColumn('draft_id');
    });
}

};