<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(true);
            $table->string('company_name');
            $table->string('decription')->nullable(true);
            $table->string('street_address')->nullable(true);
            $table->string('area_address')->nullable(true);
            $table->string('city_address')->nullable(true);
            $table->string('country_address')->nullable(true);
            $table->string('longitude')->nullable(true);
            $table->string('latitude')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('facebook')->nullable(true);
            $table->string('zalo')->nullable(true);
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
        Schema::dropIfExists('abouts');
    }
}
