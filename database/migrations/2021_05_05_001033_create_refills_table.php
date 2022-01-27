<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refills', function ( Blueprint $table ) {
            $table->id();
            $table->bigInteger('user_id')->comment('ID Пользователя');
            $table->double('amount')->comment('Сумма');
            $table->integer('status')->default(0)->comment('Статус заказа 0-Не оплачен 1-Оплачен');
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
        Schema::dropIfExists('refills');
    }
}
