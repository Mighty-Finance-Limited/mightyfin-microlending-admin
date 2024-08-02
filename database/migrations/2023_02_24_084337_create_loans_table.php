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
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('application_id')->nullable();
            $table->integer('repaid')->default(0);
            $table->dateTime('repaid_at')->nullable();
            $table->float('principal', 9, 2)->default(0);
            $table->float('payback', 9, 2)->default(0);
            $table->float('penalty', 9, 2)->default(0);
            $table->float('interest', 9, 2)->default(0);
            $table->integer('closed')->default(0);
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
        Schema::dropIfExists('loans');
    }
};
