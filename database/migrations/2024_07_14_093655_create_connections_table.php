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
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plastic_form_id');
            $table->unsignedBigInteger('recycling_organization_id');
            $table->string('status')->default('Pending');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('plastic_form_id')->references('id')->on('plastic_forms')->onDelete('cascade');
            $table->foreign('recycling_organization_id')->references('id')->on('recycling_organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
