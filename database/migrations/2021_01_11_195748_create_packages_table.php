<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function ( Blueprint $table ) {
            $table->id();
            $table->string('name')->comment('Название');
            $table->string('url')->unique()->comment('Url');
            $table->string('image')->comment('Картинка');
            $table->longText('description')->comment('Описание для RU');
            $table->longText('en_description')->comment('Описание для EN');
            $table->double('price')->comment('Цена для RU');
            $table->double('old_price')->comment('Старая цена для RU');
            $table->integer('count_buys')->default(0)->comment('Количество покупок');
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
        Schema::dropIfExists('packages');
    }
}
