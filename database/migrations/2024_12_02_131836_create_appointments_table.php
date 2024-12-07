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

        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->date('date');
            $table->text('description');
            $table->boolean('verified');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
