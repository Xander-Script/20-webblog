<?php

namespace App\Admin\Http\Controllers;

use App\Admin\ArticleAdmin;
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
//    public function index(mixed $paginator = null): view
//    {
//        return parent::index(
//            Article::without(['user', 'categories'])->latest()->paginate(50)
//        );
//
////        return $this->view([
//////            'articles' =>
////        ]);
//
////        $x = Article::first()->created_at;
//
////        dd($x);
//
////        $articles = Article::first(); //latest('published_at')->without(['user', 'categories']);
////
////        $x = (new ArticleAdmin())->mount($articles)->form()->render();
////
////
//////        $x = (new ArticleAdmin(Article::class))->form()->render();
////
////        return $this->view([
////            'authors' => Role::where('name', 'author')->first()->users()->get(),
////            'categories' => Category::all(),
////            'articles' => $articles->paginate(5),
////            'form' => $x
////        ]);
//    }
}
