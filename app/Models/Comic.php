<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comic extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover',
        'author',
        'rating',
        'type',
        'released_at',
        'status',
        'views',
        'likes',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($comic) {
            $comic->slug = Str::slug($comic->title);
        });
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
