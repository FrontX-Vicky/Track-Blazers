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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('event_id');
            $table->string('name');
            $table->string('gender');
            $table->string('event_type');
            $table->string('relay');
            $table->string('distance');
            $table->string('scoring');
            $table->string('member_count');
            $table->string('entries_unit');
            $table->string('result_unit');
            $table->string('lane_count');
            $table->string('lane_position');
            $table->string('flight_assigment');
            $table->string('flight_order');
            $table->string('advancement');
            $table->string('mode');
            $table->string('start');
            $table->string('duration');
            $table->string('modified_by');

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
        Schema::dropIfExists('events');
    }
};
