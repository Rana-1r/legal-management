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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id('consultation_id');

            $table->string('consulation_type');
            $table->date('request_date');
            $table->date('response_date')->nullable();
            $table->string('status');
            $table->boolean('is_closed')->default(false);

            $table->foreignId('request_by')->constrained('users_wm', 'user_id');
            $table->foreignId('assigned_to')->nullable()->constrained('users_wm', 'user_id');
            $table->foreignId('reviewed_by')->nullable()->constrained('users_wm', 'user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
