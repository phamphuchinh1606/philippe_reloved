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
            $table->integer('user_id')->nullable();
            $table->string('title',45)->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('description',255)->nullable();
            $table->string('model',45)->nullable();
            $table->integer('bought_price')->nullable();
            $table->integer('status_id')->nullable();
            $table->integer('delete_flg')->default(0);
            $table->timestamps();
            $table->dateTime('deleted_at');
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
