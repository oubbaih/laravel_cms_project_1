<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $fillable = ['title', 'subtitle', 'media_id', 'footer_copy_right'];
    use HasFactory;
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
