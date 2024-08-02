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
        Schema::create('loan_installments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('loan_id')->nullable(); 
            $table->dateTime('next_dates')->nullable(); 
            $table->string('type')->nullable(); //manual or auto
            $table->dateTime('paid_at')->nullable(); 
            $table->string('payment_method')->nullable();
            $table->float('amount', 9, 2)->nullable();
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
        Schema::dropIfExists('loan_installments');
    }
};
