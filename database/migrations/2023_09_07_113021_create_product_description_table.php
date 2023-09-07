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
        Schema::create('product_description', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id')->nullable();
            $table->string('title','100')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedInteger('sort_no')->nullable();

            $table->timestamp('created_at')->useCurrent();

            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_descripton');
    }
};
