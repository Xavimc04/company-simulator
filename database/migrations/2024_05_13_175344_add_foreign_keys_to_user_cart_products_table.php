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
        Schema::table('user_cart_products', function (Blueprint $table) {
            $table->foreign(['user_id'], 'fk_user_cart_products_users_user_id')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'fk_user_cart_products_products_product_id')->references(['id'])->on('products')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_cart_products', function (Blueprint $table) {
            $table->dropForeign('fk_user_cart_products_users_user_id');
            $table->dropForeign('fk_user_cart_products_products_product_id');
        });
    }
};
