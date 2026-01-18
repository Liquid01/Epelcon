<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_matrices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->integer('stage')->default(0);
            $table->string('p1')->nullable();
            $table->string('p2')->nullable();
            $table->string('p3')->nullable();
            $table->string('p4')->nullable();
            $table->string('p5')->nullable();
            $table->string('p6')->nullable();
            $table->string('p7')->nullable();
            $table->string('p8')->nullable();
            $table->string('p9')->nullable();
            $table->string('p10')->nullable();
            $table->string('p11')->nullable();
            $table->string('p12')->nullable();
            $table->string('p13')->nullable();
            $table->string('p14')->nullable();
            $table->integer('level_1')->default(0);
            $table->integer('level_2')->default(0);
            $table->integer('level_3')->default(0);
            $table->decimal('SDB', 10, 2);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('stage_matrices');
    }
}
