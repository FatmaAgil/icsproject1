<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plastic_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamp('disposed_at');
            $table->integer('points');
            $table->foreign('plastic_id')->references('id')->on('plastics');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposals');
    }
};
