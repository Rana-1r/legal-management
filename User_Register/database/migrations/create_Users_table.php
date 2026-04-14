<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

public function up(): void {

    Schema::create('roles', function (Blueprint $table) {
        $table->id('role_id'); // المفتاح الأساسي
        $table->string('role_name');
        $table->timestamps();
    });

    
    Schema::create('users_wm', function (Blueprint $table) {
        // 1. المفتاح الأساسي (Primary Key) مع علامة المفتاح في رسمتك
        $table->id('user_id'); 

        // 2. أعمدة النصوص (Varchar) كما في الرسمة
        $table->string('full_name');
        $table->string('email')->unique();
        $table->string('password_hash');

        // 3. المفتاح الأجنبي (Foreign Key) مع علامة الربط في رسمتك
        // لاحظي أننا استخدمنا unsignedBigInteger ليتوافق مع المفاتيح الأساسية
        $table->foreignId('role_id')->nullable()->constrained('roles', 'role_id');

        // 4. بقية الحقول (Department & Boolean)
        $table->string('department')->nullable();
        $table->boolean('is_active')->default(true);

        // 5. التوقيت (Datetime) كما في الرسمة
        // سطر timestamps ينشئ created_at و updated_at تلقائياً
        $table->timestamps(); 
    });

   


}

public function down(): void {

    Schema::dropIfExists('users_wm');
    Schema::dropIfExists('roles');
    }




};