<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Response;

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

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article): Response
    {
        return new Response(view('articles.show', [
            'article' => $article,
        ]));
    }
}
