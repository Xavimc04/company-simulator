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
        Schema::create('wholesalers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('center_id')->nullable()->index('fk_wholesaler_centers_center_id');
            $table->string('name', 100)->nullable();
            $table->string('cif', 100)->nullable();
            $table->string('social_denomination', 100)->nullable();
            $table->double('transport')->nullable()->default(0);
            $table->string('location', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->longText('icon')->nullable();
            $table->double('disccount')->nullable()->default(0);
            $table->integer('payment_days')->nullable()->default(7);
            $table->string('country', 100)->nullable();
            $table->integer('tax')->nullable()->default(0);
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
        Schema::dropIfExists('wholesalers');
    }
};
