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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['role_id'], 'fk_users_role_id')->references(['id'])->on('roles')->onUpdate('NO ACTION')->onDelete('SET NULL');
            $table->foreign(['center_id'], 'fk_users_center_id')->references(['id'])->on('centers')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_role_id');
            $table->dropForeign('fk_users_center_id');
        });
    }
};
