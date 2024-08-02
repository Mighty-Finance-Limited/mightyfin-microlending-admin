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
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->string('start_time')->default('08:00 am');
            $table->string('stop_time')->default('05:00 pm');
            $table->string('start_day')->default('Mon');
            $table->string('stop_day')->default('Fri');
            $table->text('slogan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alter_contact_sets');
    }
};
