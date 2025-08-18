<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Book extends Model
{
    protected $fillable = ['category_id', 'title', 'author', 'pdf_link', 'description', 'image'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getIsFavoriteAttribute()
    {
        if (!auth()->check()) return false;

        return $this->readings()
            ->where('user_id', auth()->id())
            ->where('status', 'favorite')
            ->exists();
    }
    public function readings()
    {
        return $this->hasMany(Reading::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
