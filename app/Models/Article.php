<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $attributes = [
        'user_id' => 1,
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(function ($user, $post) {
            return User::find(1); // Guest User.
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault(function ($category, $post) {
            $category->name = 'Uncategorized';
        });
    }
}
