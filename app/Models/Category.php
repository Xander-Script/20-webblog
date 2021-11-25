<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use HnhDigital\LaravelNumberConverter\Facade as NumConvert;

class Category extends Model
{
    use HasFactory;

    public function articleCount() {
        return NumConvert::word($this->article_count);
    }

    public function authorCount() {
        return NumConvert::word($this->author_count);
    }

    public function articles() {
        return $this->hasMany(Article::class);
    }
}
