<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_record', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable(false)->unsigned();
            $table->bigInteger('movement_id')->nullable(false)->unsigned();
            $table->float('value')->nullable(false);
            $table->timestamp('date')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('movement_id')->references('id')->on('movement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_record');
    }
}
