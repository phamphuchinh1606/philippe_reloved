<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuffCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuff_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',45)->nullable();
            $table->integer('level')->nullable();
            $table->integer('parent_id')->nullable(true);
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
        Schema::dropIfExists('stuff_categories');
    }
}
