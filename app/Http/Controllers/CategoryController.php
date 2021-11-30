<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::withCount([
            'articles as free_article_count' => function (Builder $query) {
                $query->withoutGlobalScope('guest')->where('premium', 0);
            },
            'articles as premium_article_count' => function (Builder $query) {
                $query->withoutGlobalScope('guest')->where('premium', 1);
            },
        ])->orderBy('name')->cursorPaginate();

        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
