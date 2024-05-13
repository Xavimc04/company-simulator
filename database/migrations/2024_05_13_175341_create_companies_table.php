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
        Schema::create('companies', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100)->nullable();
            $table->integer('center_id')->nullable()->index('fk_companies_center_id');
            $table->string('social_denomination', 100)->nullable();
            $table->string('sector', 70)->nullable();
            $table->string('status', 50)->nullable()->default('inactive');
            $table->string('cif', 30)->nullable();
            $table->longText('icon')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('cp', 15)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('contact_email', 100)->nullable();
            $table->string('form_level', 100)->nullable();
            $table->longText('website')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
