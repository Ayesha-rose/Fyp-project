<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'author','pdf_path', 'description', 'image','category_id'];
}
