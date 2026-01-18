<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('total_pvs');
            $table->decimal('percentage_split', 10,2)->default(0.00);
            $table->decimal('bonus', 10,2)->default(0.00);
            $table->string('incentive')->nullable();
            $table->integer('rank_target')->nullable();
            $table->integer('target_frequency')->nullable();
            $table->decimal('target_bonus', 10, 2)->default(0.00);
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
        Schema::dropIfExists('ranks');
    }
}
