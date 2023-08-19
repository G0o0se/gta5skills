<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function ( Blueprint $table ) {
            $table->id();
            $table->string('name', 8)->comment('Символы промокода');
            $table->integer('amount')->comment('Сумма');
            $table->integer('count_uses')->comment('Количество использований');
            $table->integer('count_used')->default(0)->comment('Количество использованых');
            $table->dateTimeTz('expiration_date')->nullable()->comment('До какой даты действительно');
            $table->boolean('status')->default(1)->comment('Статус 0-Не актив/1-Актив');
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
        Schema::dropIfExists('promocodes');
    }
}
