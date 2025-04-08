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
        Schema::table('loan_installments', function (Blueprint $table) {
            $table->date('due_date')->nullable();
            $table->decimal('installment_amount', 10, 2)->nullable();
            $table->decimal('principal', 10, 2)->nullable();
            $table->decimal('interest', 10, 2)->nullable();
            $table->decimal('remaining_balance', 10, 2)->nullable();
            $table->decimal('penalty', 10, 2)->default(0);
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('txn_id')->nullable();
            $table->unsignedBigInteger('is_cleared')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alter_loan_installments');
    }
};