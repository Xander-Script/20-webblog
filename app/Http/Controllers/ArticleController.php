<?php

namespace App\Http\Controllers;

use App\Extensions\Auth;
use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public string $model = 'article';
    public int $itemsPerPage = 3;

    public function index(): View
    {
        $articles = Article::latest()->cursorPaginate($this->itemsPerPage);
        $links = $articles->links();
        $articles = $articles->getCollection();

        // Count the number of premium articles the visitor isn't able to see.
        if (! Auth::userIsPremium()) {
            $date = $articles->pluck('created_at');

            $hidden_articles = Article::withoutGlobalScope('guest')
                ->without(['user', 'categories'])
                ->select(['title', 'created_at', 'premium', 'slug', 'published_at', 'description'])
                ->between([$date->last(), $date->first()])
                ->premium()
                ->get();

            // Merge hidden & public articles and re-sort them.
            $articles = $articles
                ->concat($hidden_articles)
                ->sortBy('created_at');
        }

        return view('articles.index', [
            'links' => $links,
            'articles' => $articles,
        ]);
    }

    public function show(Article $article): View
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
