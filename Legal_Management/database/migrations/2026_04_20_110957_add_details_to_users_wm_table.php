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
        Schema::table('users_wm', function (Blueprint $table) {
            $table->string('job_title')->after('password_hash')->nullable();
            $table->string('phone')->after('job_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_wm', function (Blueprint $table) {
            $table->dropColumn(['job_title', 'phone']);
        });
    }
};
