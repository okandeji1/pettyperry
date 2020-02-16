<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'uuid', 'user_id', 'category_id', 'header', 'content', 'cover_image'
    ];
    // User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
