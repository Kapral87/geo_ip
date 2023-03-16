<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_location', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ip_from')->nullable();
            $table->unsignedInteger('ip_to')->nullable();
            $table->char('country_code', 2)->nullable();
            $table->string('country_name', 64)->nullable();
            $table->string('region_name', 128)->nullable();
            $table->string('city_name', 128)->nullable();
            $table->double('latitude', 12, 6)->nullable();
            $table->double('longitude', 12, 6)->nullable();
            $table->index(['ip_from', 'ip_to']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip_location');
    }
}
