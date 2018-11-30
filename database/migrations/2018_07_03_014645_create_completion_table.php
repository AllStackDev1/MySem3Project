<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unique()->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->string('trans_id', 30)->unique();
            $table->foreign('trans_id')->references('id')->on('transactions');
            $table->smallInteger('status_id');
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
        Schema::dropIfExists('completion');
    }
}
