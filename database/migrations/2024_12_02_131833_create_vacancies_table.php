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
            $table->text('location');
            $table->integer('paycheck');
            $table->integer('contract_term');
            $table->integer('working_hours');
            $table->boolean('is_created')->default(false);
            $table->foreignId('company_id')->nullable()->constrained();
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
