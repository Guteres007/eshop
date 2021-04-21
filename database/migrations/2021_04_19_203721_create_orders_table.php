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
            $table->foreignId('cart_id')->unsigned()->constrained()->onDelete('cascade');
            $table->foreignId('delivery_id')->unsigned();
            $table->foreignId('payment_id')->unsigned();
            $table->string('payment_name');
            $table->decimal('payment_price');
            $table->string('delivery_name');
            $table->decimal('delivery_price');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('postcode');
            $table->string('street');
            $table->text('comment')->nullable();
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
