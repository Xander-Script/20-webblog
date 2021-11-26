<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Category;

class ArticleObserver
{
    private function getCategory(Article $article)
    {
        // Ensure a category is set.
        if (! isset($article->category_id) || is_null($article->category_id)) {
            $article->category_id = 1;

            // Ensure we don't trigger this observer
            $article->saveQuietly();
        }

        return $article->category;
    }

    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        $category = $this->getCategory($article);
        $category->article_count += 1;

        // If we've just created a post, there will at least be one result.
        if ($category->articles->where('user_id', '=', $article->user_id)->count() < 2) {
            $category->author_count += 1;
        }

        $category->save();
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        //
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        $category = $this->getCategory($article);
        $category->article_count -= 1;

        // Check if the article author has authored other articles in this category.
        if ($category->articles->where('user_id', '=', $article->user_id)->count() == 0) {
            // This user has created no other articles in this category, so update our author count.
            $category->author_count -= 1;
        }

        $category->save();
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
