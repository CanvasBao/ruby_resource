<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pd_imgs', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('img_id');
            $table->string('img_name');
            $table->timestamps();
            
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->primary(['product_id', 'img_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pd_imgs');
    }
}
