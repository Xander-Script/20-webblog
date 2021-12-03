<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;

class ArticlePolicy extends Policy
{
    public function __construct()
    {
        $user = request()->user() ?? new User;

        if (! $user->hasRole(['root', 'editor', 'author', 'premium user'])) {
            Article::addGlobalScope('guest', function (Builder $builder) {
                $builder->where('premium', 0);
            });
        }

        if (! $user->hasRole(['root', 'editor', 'author'])) {
            Article::addGlobalScope('published', function (Builder $builder) {
                $builder->where('published_at', '!=', 0);
            });
        }
    }

    public function view(?User $user, Article $article): bool
    {
        if ($article->premium) {
            if ($user === null) {
                abort(Response::HTTP_UNAUTHORIZED, 'Please sign in');
            }

            if (! $user->hasRole('premium user')) {
                abort(Response::HTTP_PAYMENT_REQUIRED, 'Subscribe to view this article');
            }
        }

        return true;
    }
}
