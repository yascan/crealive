<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'seo_title',
        'seo_description',
    ];

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function childrenCategories(){
        return $this->hasMany(Category::class)->with('categories');
    }
}
