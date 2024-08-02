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
        // Schema::create('customer_messages', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('subject')->nullable();
        //     $table->string('')->nullable();
        //     $table->string()->nullable();
        //     $table->string()->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_messages');
    }
};
