<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User_wm extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_wm';

    // إخبار لارافيل باسم المفتاح الأساسي المخصص
    protected $primaryKey = 'user_id';

    // الحقول المسموح بتعبئتها (Mass Assignment)
    protected $fillable = [
        'full_name',
        'email',
        'password_hash',
        'role_id',
        'department',
        'is_active'
    ];

    /**
     * علاقة عكسية: المستخدم ينتمي لدور واحد فقط
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}