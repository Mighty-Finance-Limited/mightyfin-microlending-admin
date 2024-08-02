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
        Schema::table('applications', function (Blueprint $table) {
            $table->float('monthly_payments', 9, 2)->nullable();
            $table->float('maximum_deductable', 9, 2)->nullable();
            $table->float('net_pay_blr', 9,2)->nullable(); //net before loan recovery
            $table->float('net_pay_alr', 9,2)->nullable(); //net pay after loan recovery
            $table->float('service_cost', 9,2)->nullable(); //net pay after loan recovery
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alter_application_3');
    }
};
