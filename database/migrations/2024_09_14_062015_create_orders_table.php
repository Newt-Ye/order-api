<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    private $currencys = ['twd','usd','jpy','rmb','myr'];
    function __construct() {

    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->currencys as $currency) {
            Schema::create('orders_'.$currency, function (Blueprint $table) {
                $table->string('id',8);
                $table->string('name',255); // 訂購人
                $table->json('address'); // 地址
                $table->integer('price'); // 金額
                $table->string('currency',3); // 幣別
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->currencys as $currency) {
            Schema::dropIfExists('orders_'.$currency);
        }
    }
}
