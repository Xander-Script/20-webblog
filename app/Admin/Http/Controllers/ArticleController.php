<?php

namespace App\Admin\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;
use JsonSerializable;
use Spatie\Permission\Models\Role;

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
