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
        Schema::create('loan_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->text('icon')->nullable();
            $table->text('description')->nullable();
            $table->string('release_date')->default(1);
            $table->integer('auto_payment')->nullable();
            $table->string('loan_duration_period')->nullable();
            $table->string('loan_interest_period')->nullable();
            
            $table->string('min_loan_duration')->nullable();
            $table->string('def_loan_duration')->nullable();
            $table->string('max_loan_duration')->nullable();

            $table->string('min_principal_amount')->nullable();
            $table->string('def_principal_amount')->nullable();
            $table->string('max_principal_amount')->nullable();
    
            $table->string('min_loan_interest')->nullable();
            $table->string('def_loan_interest')->nullable();
            $table->string('max_loan_interest')->nullable();
    
            $table->string('min_num_of_repayments')->nullable();
            $table->string('def_num_of_repayments')->nullable();
            $table->string('max_num_of_repayments')->nullable();
            $table->string('tag')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('loan_products');
    }
};
