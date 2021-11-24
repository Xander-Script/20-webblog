<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(function ($user, $post) {
            $user->name = 'Guest Author';
        });
    }

    public function category() {
        return $this->belongsTo(Category::class)->withDefault(function ($category, $post) {
            $category->name = 'Uncategorized';
        });
    }
}
