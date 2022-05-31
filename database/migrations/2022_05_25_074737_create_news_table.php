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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string("title", 255);
            $table->string("author", 255);
            $table->text("body");
            $table->string("description", 255)->nullable();
            $table->string("image", 255)->nullable();
            $table->enum("status", ["ACTIVE", "DRAFT", "BLOCKED"])->default("DRAFT");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
