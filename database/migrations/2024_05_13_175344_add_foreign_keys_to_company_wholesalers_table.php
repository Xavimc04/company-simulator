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
        Schema::table('company_wholesalers', function (Blueprint $table) {
            $table->foreign(['wholesaler_id'], 'fk_company_wholesalers_wholesaler_id')->references(['id'])->on('wholesalers')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign(['company_id'], 'fk_company_wholesalers_company_id')->references(['id'])->on('companies')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_wholesalers', function (Blueprint $table) {
            $table->dropForeign('fk_company_wholesalers_wholesaler_id');
            $table->dropForeign('fk_company_wholesalers_company_id');
        });
    }
};
