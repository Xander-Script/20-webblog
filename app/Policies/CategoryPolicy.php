<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class CategoryPolicy extends Policy
{
    public function viewAny(?User $user): bool
    {
        Category::addGlobalScope('count', function (Builder $q) {
            $q->withCount([
                'articles as free_article_count' => function (Builder $query) {
                    $query->withoutGlobalScope('guest')->where('premium', 0);
                },
                'articles as premium_article_count' => function (Builder $query) {
                    $query->withoutGlobalScope('guest')->where('premium', 1);
                },
            ]);
        });

        return true;
    }
}
