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
        Schema::create('company_wholesalers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('company_id')->nullable()->index('fk_company_wholesalers_company_id');
            $table->integer('wholesaler_id')->nullable()->index('fk_company_wholesalers_wholesaler_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_wholesalers');
    }
};
