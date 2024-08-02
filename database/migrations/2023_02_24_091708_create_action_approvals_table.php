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
        Schema::create('action_approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('application_id')->nullable();
            $table->string('type')->nullable(); //approve-loan, reject-loan, stall-loan
            $table->integer('status')->nullable(); // 0 / 1 - admin's decision
            $table->unsignedInteger('user_id')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('action_approvals');
    }
};
