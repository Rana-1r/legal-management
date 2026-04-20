<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // تعريف المفتاح الأساسي لأنه ليس id افتراضي
    protected $primaryKey = 'task_id';

    protected $fillable = [
        'title', 
        'description', 
        'assigned_to', 
        'related_entity_Type', 
        'related_entity_id', 
        'due_date', 
        'status'
    ];

    // علاقة: المهمة تعود لمستخدم واحد
    public function user()
    {
        return $this->belongsTo(User_wm::class, 'assigned_to', 'user_id');
    }

    public function role()
{
    // المهمة تنتمي لدور واحد
    return $this->belongsTo(Role::class, 'role_id', 'role_id');
}
}