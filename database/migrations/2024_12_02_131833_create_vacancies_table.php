<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->binary('image')->nullable();
            $table->string('job_title');
            $table->text('description');
            $table->integer('paycheck');
            $table->integer('contract_term');
            $table->foreignId('company_id');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
