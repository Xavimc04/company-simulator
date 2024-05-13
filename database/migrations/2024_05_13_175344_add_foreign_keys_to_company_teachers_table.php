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
        Schema::table('company_teachers', function (Blueprint $table) {
            $table->foreign(['user_id'], 'fk_companies_teachers_user_id')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['company_id'], 'fk_companies_teachers_company_id')->references(['id'])->on('companies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_teachers', function (Blueprint $table) {
            $table->dropForeign('fk_companies_teachers_user_id');
            $table->dropForeign('fk_companies_teachers_company_id');
        });
    }
};
