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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('serial', 100)->nullable();
            $table->string('status', 50)->nullable()->default('pending');
            $table->integer('seller_company_id')->nullable()->index('fk_orders_seller_company_id');
            $table->integer('buyer_company_id')->nullable()->index('fk_orders_buyer_company_id');
            $table->unsignedBigInteger('user_id')->nullable()->index('fk_orders_user_id');
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
};
