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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('installment_id')->nullable();
            $table->string('ref_no')->nullable();
            $table->float('amount_settled', 9, 2)->default(0);
            $table->float('transaction_fee', 9, 2)->default(0);
            $table->float('profit_margin', 9, 2)->default(0);
            $table->float('charge_amount', 9, 2)->default(0);
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
        Schema::dropIfExists('transactions');
    }
};
