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
            $table->string('name');
            $table->text('description');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('price_without_vat');
            $table->string('price_with_vat');
            $table->string('shopping_price');
            $table->string('tax');
            $table->text("percent_margin");
            $table->text("price_margin");
            $table->integer('quantity');
            $table->text("slug")->unique();
            $table->boolean('active')->default(1);
            $table->string('ean');
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
