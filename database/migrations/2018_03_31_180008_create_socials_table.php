<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account');
            $table->string('type');
        });

        Schema::create('social_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('social_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('social_id')->references('id')->on('socials')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'social_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_user');
        Schema::dropIfExists('socials');
        
    }
}
