<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['media_id', 'content'];
    use HasFactory;
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
