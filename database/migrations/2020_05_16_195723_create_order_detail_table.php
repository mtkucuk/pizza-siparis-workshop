<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('price',4,2);
            $table->integer('count'); //adet
            $table->integer('currency');
            $table->integer('tax'); //kdv
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')
            ->onUpdate("CASCADE")
                ->onDelete("CASCADE")
            ;

            $table->foreign('product_id')->references('id')->on('products')
                ->onUpdate("CASCADE")
                ->onDelete("SET NULL")
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
