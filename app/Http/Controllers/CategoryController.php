<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public string $model = 'category';

    public function index(): View
    {
        $categories = Category::orderBy('name')->cursorPaginate();

        return view('categories.index', ['categories' => $categories]);
    }

    public function show(Category $category): View
    {
        $articles = $category->articles()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(5);

        return view('categories.show', [
            'articles' => $articles,
            'category' => $category,
        ]);
    }
}
