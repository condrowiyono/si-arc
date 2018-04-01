<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->unique();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('phone_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('phone_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('phone_id')->references('id')->on('phones')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'phone_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone_user');
        Schema::dropIfExists('phones');

    }
}
