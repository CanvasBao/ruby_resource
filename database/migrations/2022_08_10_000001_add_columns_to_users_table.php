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
            $table->string('company')->nullable()->after('name');
            $table->string('address')->nullable()->after('company');
            $table->string('phone')->nullable()->after('address');
            $table->smallInteger('role')->default(1)->after('phone');
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
            $table->dropColumn(array_merge([
                'company',
                'address',
                'phone',
                'role',
                'created_at',
                'updated_at'
            ]));
        });
    }
};
