<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['category_id', 'title', 'author','pdf_path', 'description', 'image'];
}
