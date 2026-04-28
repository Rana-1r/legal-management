<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $primaryKey = 'consultation_id';

    protected $fillable = [
        'consulation_type', 
        'request_date', 
        'response_date',
        'status', 
        'request_by',
        'assigned_to', 
        'reviewed_by'
    ];

    public function requester()
    {
        return $this->belongsTo(User_wm::class, 'request_by', 'user_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User_wm::class, 'assigned_to', 'user_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User_wm::class, 'reviewed_by', 'user_id');
    }
}
