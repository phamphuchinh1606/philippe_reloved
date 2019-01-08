<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',100)->nullable();
            $table->string('full_name',100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('city',100)->nullable();
            $table->string('avatar',255)->nullable(true);
            $table->integer('is_active')->default('1');
            $table->integer('delete_flg')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
