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
        'media_id',
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
