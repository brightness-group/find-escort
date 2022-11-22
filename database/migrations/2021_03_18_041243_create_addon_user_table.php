<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAddonUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addon_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->smallInteger('addon_id', false, true);
            $table->timestamp('paused_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->unsignedBigInteger('free_by')->nullable();
            $table->enum('type', ['paid', 'registered', 'refer'])->default('paid');
            $table->boolean('paid')->default(0);
            $table->timestamps();

            $table->foreign('free_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('addon_id')->references('id')->on('addons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addon_user');
    }
}
