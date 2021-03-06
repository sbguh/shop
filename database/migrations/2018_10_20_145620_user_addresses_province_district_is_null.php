<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAddressesProvinceDistrictIsNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_addresses', function (Blueprint $table) {
            $table->string('province')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('district')->nullable()->change();
            $table->unsignedInteger('zip')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_addresses', function (Blueprint $table) {
            $table->string('province')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->string('district')->nullable(false)->change();
            $table->unsignedInteger('zip')->nullable(false)->change();
        });
    }
}
