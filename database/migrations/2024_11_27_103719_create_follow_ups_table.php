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
        Schema::create('follow_ups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_accident_id')->constrained()->onDelete('cascade');
            $table->string('work_accident_name')->nullable();
            $table->boolean('is_approve_admin')->default(false);
            $table->string('admin_name')->nullable();
            $table->string('icon')->nullable();
            $table->string('document_path')->nullable();
            // 0 : Tidak Disetujui
            // 1 : Disetujui
            // 2 : Revisi
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follow_ups');
    }
};
