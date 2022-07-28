<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Article extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image',
        'author',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
