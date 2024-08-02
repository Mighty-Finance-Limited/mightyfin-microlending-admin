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
        Schema::create('loan_manual_approvers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('added_by')->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('is_passed')->default(0);
            $table->integer('is_active')->default(0);
            $table->integer('is_processing')->default(1);
            $table->integer('priority')->nullable();
            $table->string('status')->nullable(); //rejected or accepted
            $table->text('reason')->nullable();
            $table->string('estimate')->nullable();
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
        Schema::dropIfExists('loan_manual_approvers');
    }
};
