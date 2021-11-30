<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

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
                $builder->where('draft', 0);
            });
        }
    }

    // ArticleController::index
    public function viewAny(?User $user): bool
    {
        return true;
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
//
//    /**
//     * Determine whether the user can create models.
//     *
//     * @param User $user
//     * @return Response|bool
//     */
//    public function create(User $user)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can update the model.
//     *
//     * @param User $user
//     * @param Article $article
//     * @return Response|bool
//     */
//    public function update(User $user, Article $article)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can delete the model.
//     *
//     * @param User $user
//     * @param Article $article
//     * @return Response|bool
//     */
//    public function delete(User $user, Article $article)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can restore the model.
//     *
//     * @param User $user
//     * @param Article $article
//     * @return Response|bool
//     */
//    public function restore(User $user, Article $article)
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the model.
//     *
//     * @param User $user
//     * @param Article $article
//     * @return Response|bool
//     */
//    public function forceDelete(User $user, Article $article)
//    {
//        //
//    }
}
