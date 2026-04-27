<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $fillable = [
        'original_url',
        'short_code',
        'clicks',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
