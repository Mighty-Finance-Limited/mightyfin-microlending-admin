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
        Schema::create('loan_product_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('usage_count')->nullable();
            $table->unsignedBigInteger('loan_product_id')->nullable();
            $table->bigInteger('usage_success_count')->nullable();
            $table->bigInteger('usage_failure_count')->nullable();
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
        Schema::dropIfExists('loan_product_attributes');
    }
};
