<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->longText('ages')->nullable();
            $table->longText('specialities')->nullable();
            $table->tinyInteger('girls')->default('0');
            $table->tinyInteger('trans')->default('0');
            $table->tinyInteger('certified')->default('0');
            $table->tinyInteger('language')->default('0');
            $table->tinyInteger('ethnicity')->default('0');
            $table->tinyInteger('body')->default('0');
            $table->tinyInteger('cup_size')->default('0');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_preferences');
    }
}
