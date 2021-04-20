<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('sale')->nullable()->default(false);
            $table->boolean('new')->nullable()->default(false);
            $table->boolean('action')->nullable()->default(false);
            $table->boolean('homepage')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sale');
            $table->dropColumn('new');
            $table->dropColumn('action');
            $table->dropColumn('homepage');
        });
    }
}
