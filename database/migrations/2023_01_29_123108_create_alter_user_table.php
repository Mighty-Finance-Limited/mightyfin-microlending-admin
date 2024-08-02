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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('nrc')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->float('basic_pay', 9, 2)->nullable();
            $table->string('loan_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alter_user');
    }
};
