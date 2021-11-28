<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return new Response(view('articles.index', [
            'articles' => Article::published()->latest()->cursorPaginate(3),
        ]));
    }

    public function show(Article $article): View
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
