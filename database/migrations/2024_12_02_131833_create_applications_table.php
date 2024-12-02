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

        Schema::create('vacatures', function (Blueprint $table) {
            $table->id();
            $table->string('function');
            $table->text('description');
            $table->integer('wage');
            $table->integer('contract_duration');
            $table->bigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('bedrijven');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacatures');
    }
};
