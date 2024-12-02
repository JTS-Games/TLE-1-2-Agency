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
        Schema::disableForeignKeyConstraints();

        Schema::create('afspraken', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('register_id');
            $table->foreign('register_id')->references('id')->on('aanmelding');
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('bedrijven');
            $table->date('date');
            $table->text('description');
            $table->boolean('verified');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afspraken');
    }
};
