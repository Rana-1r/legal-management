<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id'); // المفتاح الأساسي
            $table->string('title');
            $table->text('description')->nullable();
            
            // الربط مع جدول المستخدمين
            $table->foreignId('assigned_to')->constrained('users_wm', 'user_id')->onDelete('cascade');
            
            $table->string('related_entity_Type')->nullable(); 
            $table->integer('related_entity_id')->nullable(); 
            $table->date('due_date')->nullable();
            $table->string('status')->default('pending'); // (pending, in_progress, completed)
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};