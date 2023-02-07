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
        Schema::create('hirers', function (Blueprint $table) {
            $table->id();

            $table->string('name',35);
            $table->string('cnic',15)->unique();
            $table->string('dob',10);
            $table->string('gender',6);
            $table->string('address',75);
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            
            $table->double('phone_no',11);
            $table->string('email',30)->unique();
            $table->string('dp');
            
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('hirers');
    }
};
