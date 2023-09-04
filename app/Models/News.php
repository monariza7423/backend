<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'html_content',
    ];

    public function getAvatarUrlAttribute()
    {
        // Assuming you've configured a public disk in filesystems.php
        // and you're saving images in storage/app/public/avatars
        return $this->avatar ? asset('storage/' . $this->avatar) : null;
    }
}
