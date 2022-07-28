<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Category extends Model
{
    
    protected $fillable = ['category_name'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
