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
        Schema::create('verification_codes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 80)->nullable();
            $table->integer('center_id')->nullable()->index('fk_verification_codes_center_id');
            $table->integer('role_id')->nullable()->index('fk_verification_codes_role_id');
            $table->integer('usages')->nullable()->default(1);
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
        Schema::dropIfExists('verification_codes');
    }
};
