<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('sponsor');
            $table->string('parent');
            $table->integer('position');
            $table->integer('address')->nullable();
            $table->integer('state_of_origin')->nullable();
            $table->integer('lga_of_origin')->nullable();
            $table->string('profile_pic');
            $table->string('phone')->nullable();
            $table->string('membership_id');
            $table->integer('bank_id')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->integer('current_stage')->default(0);
            $table->integer('current_level')->default(0);
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
        Schema::dropIfExists('members');
    }
}
