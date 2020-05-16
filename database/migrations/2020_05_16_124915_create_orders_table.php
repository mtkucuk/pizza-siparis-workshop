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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userId')->nullable()->default(0);
            $table->decimal('totalPrice', 4, 2);
            $table->string('payment_type',255);
            $table->string('payment_bank',255);

            $table->integer('payment_nper')->default(0)->nullable(); // taksit sayısı
            $table->dateTime('added_date');
            $table->dateTime('payment_date');
            $table->dateTime('complete_date');
            $table->integer('status');

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
