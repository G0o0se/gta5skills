<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function ( Blueprint $table ) {
            $table->id();
            $table->bigInteger('user_id')->unique()->comment('Уникальный ID');
            $table->string('name')->comment('Имя');
            $table->string('avatar')->comment('Аватар');
            $table->double('balance')->default(0)->comment('Баланс');
            $table->string('email')->nullable()->comment('Почта');
            $table->string('ip')->nullable()->comment('IP');
            $table->boolean('is_admin')->default(0)->comment('Админ ли он?');
            $table->rememberToken();
            $table->timestamps();
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
