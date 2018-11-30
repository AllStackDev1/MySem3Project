<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedinteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_ip', 225);
            $table->string('trans_id', 30)->unique();
            $table->foreign('trans_id')->references('id')->on('transactions');
            $table->mediumInteger('item_set');
            $table->integer('total_item');
            $table->double('amount', 15,2);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('country', 100);
            $table->string('state_region', 100);
            $table->string('zip', 100);
            $table->text('address');
            $table->string('telephone', 20);
            $table->string('pay_method', 100);
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
