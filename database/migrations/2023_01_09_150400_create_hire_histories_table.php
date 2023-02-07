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
        Schema::create('hire_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hirer_id');
            $table->foreign('hirer_id')->references('id')->on('hirers')->onDelete('cascade');

            $table->unsignedBigInteger('worker_id');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->string('date');
            $table->string('hired_time');
            $table->string('completed_time')->nullable();
            $table->string('bill')->nullable();
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
        Schema::dropIfExists('hire_histories');
    }
};
