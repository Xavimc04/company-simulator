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
        Schema::create('company_teachers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('user_id')->nullable()->index('fk_companies_teachers_user_id');
            $table->integer('company_id')->nullable()->index('fk_companies_teachers_company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_teachers');
    }
};
