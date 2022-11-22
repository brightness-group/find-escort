<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCoworkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('coworkers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escort_id');
            $table->unsignedBigInteger('coworker_id');
            $table->timestamps();
            $table->foreign('escort_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('coworker_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('coworkers');
    }
}
