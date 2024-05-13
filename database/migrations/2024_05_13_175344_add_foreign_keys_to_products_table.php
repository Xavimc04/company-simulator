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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['company_id'], 'fk_products_company_id')->references(['id'])->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['category_id'], 'fk_products_category_id')->references(['id'])->on('product_categories')->onUpdate('SET NULL')->onDelete('SET NULL');
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
            $table->dropForeign('fk_products_company_id');
            $table->dropForeign('fk_products_category_id');
        });
    }
};
