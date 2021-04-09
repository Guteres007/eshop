<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_id')->unsigned()->constrained()->onDelete('cascade');
            $table->foreignId('payment_id')->unsigned()->constrained()->onDelete('cascade');
            $table->boolean('active')->default(0);
            $table->decimal('price')->nullable();
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
        Schema::dropIfExists('delivery_payment');
    }
}
