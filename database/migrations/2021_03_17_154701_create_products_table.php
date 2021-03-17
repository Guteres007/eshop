<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('internal_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('price_without_vat');
            $table->string('price');
            $table->string("price_margin");
            $table->string('shopping_price')->nullable();
            $table->string('tax');
            $table->integer('quantity');
            $table->string("slug")->unique();
            $table->boolean('active')->default(1);
            $table->string('ean')->nullable();
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
        Schema::dropIfExists('products');
    }
}
