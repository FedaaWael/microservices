<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration file: create_biomarkers_table.php
return new class extends Migration
{
    public function up()
    {
        Schema::create('biomarkers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('heart_rate')->nullable();
            $table->integer('calories_burned')->nullable();
            $table->integer('sleep_duration_minutes')->nullable();
            $table->integer('steps_count')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('biomarkers');
    }
};
