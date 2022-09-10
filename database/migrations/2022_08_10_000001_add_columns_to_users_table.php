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
        Schema::table('users', function (Blueprint $table) {
            $table->dropTimestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('company')->nullable()->after('first_name');
            $table->string('address')->nullable()->after('company');
            $table->string('tel')->nullable()->after('address');
            $table->smallInteger('role')->default(1)->after('tel');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->dropColumn(array_merge([
                'last_name',
                'first_name',
                'last_name_kana',
                'first_name_kana',
                'post_code',
                'address_1',
                'address_2',
                'tel',
                'role',
                'birthday',
            ]));
        });
    }
};
