<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];

    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
}
