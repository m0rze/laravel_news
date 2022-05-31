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
            $table->unsignedBigInteger("category_id")
            ->after("id");
            $table
                ->foreign("category_id")
                ->references("id")
                ->on("categories")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->index("category_id");
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
            $table->dropIndex("category_id");
            $table->dropColumn("category_id");
        });
    }
};
