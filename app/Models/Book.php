<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['category_name', 'title', 'author', 'pdf_link', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
