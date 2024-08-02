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
        Schema::create('withdraw_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('wallet_id')->nullable();
            $table->float('amount', 9, 2)->nullable();
            $table->text('comments')->nullable();
            $table->string('ref')->nullable();
            $table->string('withdraw_method')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('card_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('card_number')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('processed_by')->nullable();
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
        Schema::dropIfExists('withdraw_requests');
    }
};
