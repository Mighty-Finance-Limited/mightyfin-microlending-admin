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
        Schema::create('application_stages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('loan_status_id')->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->string('stage')->nullable();
            $table->string('status')->nullable();
            $table->string('state')->nullable();
            $table->string('prev_status')->default('complete');
            $table->string('curr_status')->nullable();
            $table->bigInteger('position')->default(0);
            
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
        Schema::dropIfExists('application_stages');
    }
};
