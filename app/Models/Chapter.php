<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'comic_id',
        'title',
        'number',
        'released_at',
        'is_active',
    ];

    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }
}
