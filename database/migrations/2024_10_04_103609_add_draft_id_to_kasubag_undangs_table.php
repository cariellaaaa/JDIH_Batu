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
    Schema::table('kasubag_undangs', function (Blueprint $table) {
        $table->unsignedBigInteger('draft_id')->nullable();
        $table->foreign('draft_id')->references('id')->on('drafts')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('kasubag_undangs', function (Blueprint $table) {
        $table->dropForeign(['draft_id']);
        $table->dropColumn('draft_id');
    });
}
};