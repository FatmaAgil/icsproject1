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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->unsignedBigInteger('user_id'); // Assuming user sending the message
            $table->unsignedBigInteger('recycling_organization_id'); // Assuming recipient organization
            $table->timestamps();
             // Foreign keys
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('recycling_organization_id')->references('id')->on('recycling_organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
