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
        Schema::create('loan_wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('deposit', 9,2)->default(0);
            $table->float('withraw', 9,2)->default(0);
            $table->bigInteger('acc_no')->nullable();
            $table->string('ccv')->nullable();
            $table->integer('sort_code')->nullable();
            $table->string('branch')->nullable();
            $table->integer('phone')->nullable();
            $table->string('expire_date')->nullable();
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
        Schema::dropIfExists('loan_wallets');
    }
};
