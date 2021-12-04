<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\Cursor;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public string $model = 'article';

    public int $itemsPerPage = 5;

    public function index(): View
    {
        return view('articles.index', [
            'articles' => Article::latest('published_at')->paginate($this->itemsPerPage),
        ]);
    }

    public function show(Article $article): View
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
