<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'posts_id'];
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
