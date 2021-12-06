<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Auth;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\Cursor;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class ArticleController extends Controller
{
    public function index(): view
    {
        return $this->view([
            'articles' => Article::latest('published_at')->paginate(5),
        ]);
    }

//    public string $model = 'article';

//    public string $model = 'article';
//
//    public int $itemsPerPage = 5;
//
//    public function index(): View
//    {
//
//        // TODO cache...
//        return view('articles.index', [
//            'categories' => Category::all(['id', 'name', 'slug']),
//            'authors' => Role::where('name', 'author')->first()->users()->get(),
//            'articles' => Article::latest('published_at')->paginate($this->itemsPerPage),
//        ]);
//    }
//
//    public function show(Article $article): View
//    {
//        return view('articles.show', [
//            'article' => $article,
//        ]);
//    }
}
