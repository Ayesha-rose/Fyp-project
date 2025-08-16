<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityStreak extends Model
{
    protected $fillable = [
        'user_id',
        'activity_date',
        'streak_count',
    ];
    protected $casts = [
        'activity_date' => 'date', // yaha Laravel automatically Carbon object bana dega
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
