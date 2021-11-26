<?php

namespace App\Models;

use HnhDigital\LaravelNumberConverter\Facade as NumConvert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function convertArticleCountToWords()
    {
        return NumConvert::word($this->article_count);
    }

    public function convertAuthorCountToWords()
    {
        return NumConvert::word($this->author_count);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
