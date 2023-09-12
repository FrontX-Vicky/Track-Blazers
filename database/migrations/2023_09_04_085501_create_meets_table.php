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
        Schema::create('meets', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('location');
          $table->date('from_date');
          $table->date('to_date');
          $table->integer('scoring')->default(0);
          $table->integer('status')->default(0);
          $table->string('created_by');
          $table->string('modified_by')->default('');
          $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meets');
    }
};
