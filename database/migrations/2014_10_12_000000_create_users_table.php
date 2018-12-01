<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username')->unique();
            $table->string('phone_no')->unique();

            $table->unsignedInteger('division_id')->comment('Division Table ID');
            $table->unsignedInteger('district_id')->comment('District Table ID');
            $table->text('street_Address');

            $table->text('shipping_address')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('avatar')->nullable();

            $table->string('email')->unique();
            $table->string('password');
              $table->unsignedTinyInteger('status')->default(0)->comment('O=Inactive|1=Active|2=Banned');


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
