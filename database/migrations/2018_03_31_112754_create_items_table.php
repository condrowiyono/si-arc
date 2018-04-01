<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('source_id')->unsigned();

            $table->string('item_code');
            $table->string('item_name');
            $table->longText('specification');
            $table->date('date_enter');
            $table->string('condition');
            $table->mediumInteger('value'); //estimated value
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'fk_item_creator')->references('id')->on('users');
            $table->foreign('owner_id', 'fk_item_owner')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('source_id')->references('id')->on('sources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
