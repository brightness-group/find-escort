<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'thumbnail', 'featured', 'published'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function thumbnailPath($withDefault = false)
    {
        if ($this->thumbnail) {
            return "uploads/blogs/$this->thumbnail";
        }

        if (!$this->thumbnail && $withDefault) {
            return "images/blog-img.png";
        }
    }

    public function truncatedContent()
    {
        return Str::limit(strip_tags($this->content), 50);
    }

    public function truncatedTitle()
    {
        return Str::limit(strip_tags($this->title), 50);
    }
}
