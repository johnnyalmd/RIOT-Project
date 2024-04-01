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
        Schema::table('champions', function (Blueprint $table) {
            $table->string('color_1')->nullable();
            $table->string('color_2')->nullable();
            $table->string('color_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('champions', function (Blueprint $table) {
            $table->dropColumn('color_1');
            $table->dropColumn('color_2');
            $table->dropColumn('color_3');
        });
    }
};