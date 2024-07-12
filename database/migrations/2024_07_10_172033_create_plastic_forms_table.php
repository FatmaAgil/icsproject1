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
        Schema::create('plastic_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('plastic_type');
            $table->decimal('quantity', 8, 2);
            $table->string('condition');
            $table->date('collection_date');
            $table->time('collection_time');
            $table->text('instructions')->nullable();
            $table->string('payment_method');
            $table->string('bank_details')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plastic_forms');
    }
};
