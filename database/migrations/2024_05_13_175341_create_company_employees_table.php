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
        Schema::create('company_employees', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('company_id')->nullable()->index('fk_company_employees_company_id');
            $table->unsignedBigInteger('user_id')->nullable()->index('fk_company_employees_user_id');
            $table->string('dept', 100)->nullable();
            $table->integer('boss')->nullable()->default(0);
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
        Schema::dropIfExists('company_employees');
    }
};
