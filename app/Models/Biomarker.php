<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biomarker extends Model
{
    protected $fillable = [
        'user_id',
        'heart_rate',
        'calories_burned',
        'sleep_duration_minutes',
        'steps_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
