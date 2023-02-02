<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTableTable extends Migration
{
    public function up()
    {
        Schema::create('order_table', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained();
            $table->foreignId('table_id')->constrained();
            $table->primary(['order_id','table_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_table');
    }
}
