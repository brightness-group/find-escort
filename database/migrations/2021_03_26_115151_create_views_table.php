<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escort_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('count')->nullable();
            $table->string("url");
            $table->string("session_id");
            $table->string("ip");
            $table->string("agent");
            $table->timestamps();
            $table->foreign('escort_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('views');
    }
}
