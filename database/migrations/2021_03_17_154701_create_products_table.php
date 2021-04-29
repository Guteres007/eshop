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
            $table->decimal('price_without_vat')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal("price_margin")->nullable();
            $table->decimal('shopping_price')->nullable();
            $table->decimal('tax')->nullable();
            $table->integer('quantity')->nullable();
            $table->string("slug")->unique();
            $table->boolean('active')->default(0);
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
