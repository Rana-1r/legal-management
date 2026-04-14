<?php

class Role extends Model
{
    protected $primaryKey = 'role_id'; // لأننا خصصنا الاسم في المايجريشن

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'role_id');
    }
}