<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'description',
        'yt_iframe',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'created_by',
    ];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id'); // Corrected the foreign and local keys
    }

    // Define the relationship with the SubCategory model
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id'); // Corrected class name casing and foreign/local keys
    }
}
