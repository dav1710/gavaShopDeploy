<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColorShoesSizeToBasketProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('basket_product', function (Blueprint $table) {
            $table->string('shoes_size')->after('quantity')->nullable();
            $table->string('color_id')->after('shoes_size')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('basket_product', function (Blueprint $table) {
            $table->dropColumn('shoes_size');
            $table->dropColumn('color_id');
        });
    }
}
