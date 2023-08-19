<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivatedPromocodesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activated_promocodes_history', function ( Blueprint $table ) {
            $table->id();
            $table->bigInteger('user_id')->comment('ID Пользователя');
            $table->bigInteger('promocode_id')->comment('ID Промокода');
            $table->integer('amount')->comment('Сумма');
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
        Schema::dropIfExists('activated_promocodes_history');
    }
}
