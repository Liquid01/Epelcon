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
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('position')->default(0);
            $table->string('phone_number');
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('username')->unique;
            $table->string('sponsor');
            $table->string('parent')->nullable();
            $table->string('membership_id');
            $table->integer('is_admin')->default(0);
            $table->integer('level')->default(0);
            $table->integer('stage')->default(0);
            $table->string('left_index')->nullable();
            $table->string('right_index')->nullable();
            $table->integer('bank_id')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->integer('bank_account_number')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('password');
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
