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
            $table->string('start_time')->nullable()->change();
            $table->string('stop_time')->nullable()->change();
            $table->string('start_day')->nullable()->change();
            $table->string('stop_day')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alter_contactssettings');
    }
};
