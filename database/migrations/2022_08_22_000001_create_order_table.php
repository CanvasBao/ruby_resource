<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');

            $table->Integer('tax')->nullable();
            $table->unsignedInteger('order_status')->default(1);
            $table->string('coupon_code')->nullable();
            $table->Integer('discount')->default(0);
            $table->Integer('payment_total');
            $table->integer('payment_method');
            $table->date('payment_date')->nullable();

            $table->Integer('postage')->nullable();
            $table->date('receipt_date')->nullable();

            $table->string('note','500')->nullable();
            $table->unsignedSmallInteger('print_status')->default(0);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
