<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'role_id'; 

    public function users()
    {
        return $this->hasMany(User_wm::class, 'role_id', 'role_id');
    }

    public function tasks()
{
    // الدور الواحد له مهام كثيرة
    return $this->hasMany(Task::class, 'role_id', 'role_id');
}
}