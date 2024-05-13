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
        Schema::table('wholesalers', function (Blueprint $table) {
            $table->foreign(['center_id'], 'fk_wholesaler_centers_center_id')->references(['id'])->on('centers')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wholesalers', function (Blueprint $table) {
            $table->dropForeign('fk_wholesaler_centers_center_id');
        });
    }
};
