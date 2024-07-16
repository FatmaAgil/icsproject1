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
        Schema::table('plastic_forms', function (Blueprint $table) {
                $table->string('email')->after('phone_number')->nullable(); // Add the email column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plastic_forms', function (Blueprint $table) {
            //
        });
    }
};
