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
        Schema::table('news', function (Blueprint $table) {
            $table->unsignedBigInteger("source_id")
                ->after("category_id");
            $table
                ->foreign("source_id")
                ->references("id")
                ->on("sources")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->index("source_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropIndex("source_id");
            $table->dropColumn("source_id");
        });
    }
};
