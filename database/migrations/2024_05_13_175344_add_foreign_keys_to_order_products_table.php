<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->foreign(['product_id'], 'fk_order_products_product_id')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['order_id'], 'fk_order_products_order_id')->references(['id'])->on('orders')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropForeign('fk_order_products_product_id');
            $table->dropForeign('fk_order_products_order_id');
        });
    }
};
