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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('microbiology')->default(0);
            $table->double('humidity')->default(0);
            $table->double('lighting')->default(0);
            $table->double('noise')->default(0);
            $table->string('pdf_microbiology')->nullable();
            $table->string('pdf_humidity')->nullable();
            $table->string('pdf_lighting')->nullable();
            $table->string('pdf_noise')->nullable();
            $table->boolean('is_approve_microbiology')->default(false);
            $table->boolean('is_approve_humidity')->default(false);
            $table->boolean('is_approve_lighting')->default(false);
            $table->boolean('is_approve_noise')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
