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
        Schema::create('champions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_custom')->unique();
            $table->text('description');
            $table->text('lore');
            $table->timestamps();
        });

        Schema::create('champion_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('champion_id');
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('champion_id')->references('id')->on('champions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('champion_images');
        Schema::dropIfExists('champions');
    }
};
