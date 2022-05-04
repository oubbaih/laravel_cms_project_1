<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Posts extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'post_image',
        'body',
        'category_id'
    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getPostImageAttribute($value)
    {
        return asset($value);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
