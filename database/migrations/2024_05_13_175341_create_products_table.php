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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('company_id')->nullable()->index('fk_products_company_id');
            $table->string('label', 50)->nullable();
            $table->longText('description')->nullable();
            $table->string('reference', 100)->nullable();
            $table->double('price')->nullable();
            $table->longText('image')->nullable();
            $table->string('status', 50)->nullable()->default('active');
            $table->integer('category_id')->nullable()->index('fk_products_category_id');
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
};
