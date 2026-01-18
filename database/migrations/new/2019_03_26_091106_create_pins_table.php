<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial', 15)->unique();
            $table->string('code', 15)->unique();
            $table->integer('status')->default(0);
            $table->dateTime('used_date')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('used_by')->nullable();
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
        Schema::dropIfExists('pins');
    }
}
