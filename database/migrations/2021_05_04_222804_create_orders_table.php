<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function ( Blueprint $table ) {
            $table->id();
            $table->bigInteger('user_id')->comment('ID пользователя');
            $table->bigInteger('package_id')->comment('ID пакета');
            $table->integer('status')->default(0)->comment('Статус заказа 0-Не выполнен 1-Выполняется 2-Выполнен');
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
        Schema::dropIfExists('orders');
    }
}
