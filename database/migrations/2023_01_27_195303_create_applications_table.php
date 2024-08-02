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
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lname')->nullable();
            $table->string('fname')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('type')->nullable();
            $table->string('repayment_plan')->nullable();
    
            $table->string('glname')->nullable();
            $table->string('gfname')->nullable();
            $table->string('gemail')->nullable();
            $table->integer('gphone')->nullable();
            $table->string('g_gender')->nullable();
            $table->string('g_relation')->nullable();
    
            $table->string('g2lname')->nullable();
            $table->string('g2fname')->nullable();
            $table->string('g2email')->nullable();
            $table->integer('g2phone')->nullable();
            $table->string('g2_gender')->nullable();
            $table->string('g2_relation')->nullable();

            $table->string('nrc_file')->nullable();
            $table->string('tpin_file')->nullable();
            $table->string('business_file')->nullable();
            $table->string('payslip_file')->nullable();
            $table->string('bank_trans_file')->nullable();
            $table->string('bill_file')->nullable();
    
            $table->unsignedInteger('user_id')->nullable();
            $table->string('guest_id')->nullable();
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
        Schema::dropIfExists('applications');
    }
};
