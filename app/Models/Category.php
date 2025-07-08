<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'book_name', 'date'];
}
