<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'post',
        'slug',
        'user_id',
        'seo_title',
        'seo_description',
    ];

    public function articleCategory(){
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }
}
