<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badge_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('level_id')->unsigned()->nullable();
            $table->integer('badge_id')->unsigned()->nullable();
            $table->integer('total_checkin');
            $table->timestamps();
        });

        Schema::table('badge_users', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('SET NULL');
            $table->foreign('badge_id')->references('id')->on('badges')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badge_users');
    }
}
