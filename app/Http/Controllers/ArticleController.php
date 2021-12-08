<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Xanderificnl\LaravelQuill\LaravelQuill;

class ArticleController extends Controller
{
    public function index(): view
    {
        return $this->view([
            'authors' => Role::where('name', 'author')->first()->users()->get(),
            'categories' => Category::all(),
            'articles' => Article::latest('published_at')->without(['user', 'categories'])->paginate(5),
        ]);
    }
}
