<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Category;

class ArticleObserver
{
    private function getCategory(Article $article) {
        // if (!isset($article->category) || is_null($article->category->id)) {
            // $article->category_id = 1; // Uncategorized
            // $article->saveQuietly(); // save without executing `created()`
        // }

        if (!isset($article->category_id) || is_null($article->category_id)) {
            $article->category_id = 1;
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
