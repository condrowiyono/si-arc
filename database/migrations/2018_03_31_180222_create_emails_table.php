<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
        });

        Schema::create('email_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('email_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('email_id')->references('id')->on('emails')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'email_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_user');
        Schema::dropIfExists('emails');


    }
}
