<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('ranking');
            $table->string('name_en', 100);
            $table->string('name_bn', 100);
            $table->string('web_image', 500)->nullable()->comment('url');
            $table->string('app_image', 500)->nullable()->comment('url');
            $table->boolean('is_active')->comment('0-inactive,1-active');
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
        Schema::dropIfExists('categories');
    }
}
