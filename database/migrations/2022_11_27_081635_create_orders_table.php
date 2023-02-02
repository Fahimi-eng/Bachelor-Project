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
            $table->id();
            $table->string('customer');
            $table->string('date');
            $table->enum('meal',['dinner' , 'lunch']);
            $table->string('phone');
            $table->enum('time',['11:00','11:30','12:00','12:30','13:00','13:30','19:00','19:30','20:00','20:30','21:00','21:30']);
            $table->string('guests');
            $table->string('bill');
            $table->enum('status',['failed','done','inProcess'])->default('inProcess');
            $table->string('transactionId')->default('0000');
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
