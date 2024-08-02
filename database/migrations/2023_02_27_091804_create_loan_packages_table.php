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
        Schema::create('loan_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('added_by')->nullable();
            $table->unsignedInteger('rate_id')->nullable();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('phone_num')->nullable();
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
        Schema::dropIfExists('loan_packages');
    }
};
