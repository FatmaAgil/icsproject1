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
        Schema::create('plastics', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->text('introduction');
            $table->text('environmental_impact');
            $table->text('brief_history'); // brief history of the plastic type
            $table->text('video_links');
            $table->text('recycling_info');
            $table->text('physical_properties');
            $table->text('uses');
            $table->json('images')->nullable();;
            $table->timestamps();

        });

    }
    public function down()
    {
     Schema::dropIfExists('plastics');
        }
    };
