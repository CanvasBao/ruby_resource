<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgfiles', function (Blueprint $table) {
            $table->char('file_id', 4);
            $table->char('parent_folder_id', 4)->nullable(true)->default("0000");
            $table->string('file_name');
            $table->timestamps();

            $table->primary('file_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imgfiles');
    }
}
