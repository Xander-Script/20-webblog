<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use NumConvert;
use Tests\TestCase;

class ArticleObserverMutatesCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testNumberOfArticlesMatchMetadataInTheCategoriesTable(int $category_id = 1)
    {
        $articles = Article::factory($this->randomNumber())->category($category_id)->create();
        $category = Category::find($category_id)->first();

        $this->assertEquals($articles->count(), $category->article_count);
    }

    public function randomNumber(int $start = 0, int $end = 100): int
    {
        return rand($start, $end);
    }

    public function testWhetherTheNumberToWordConverterConvertsTheNumberFiveHundredCorrectly()
    {
        $this->assertEquals('five hundred', NumConvert::word(500));
    }

    public function testWhetherWeCanReliablyConvertTheArticleCountToWords(int $category_id = 1)
    {
        $articles = Article::factory(250)->category($category_id)->create();
        $category = Category::find($category_id)->first();

        $this->assertEquals('two hundred and fifty', $category->convertArticleCountToWords());
    }

    public function testNumberOfAuthorsMatchMetadataInCategoriesTable(int $category_id = 1)
    {
        $authors = User::factory($this->randomNumber(25, 50))->create();
        $articles = Article::factory($this->randomNumber(50))->category($category_id);
        $articles->create();
        $articles->user_id(1)->create();
        $articles = Article::where('category_id', $category_id)->get();
        $category = Category::find($category_id)->first();

        $this->assertEquals($articles->unique('user_id')->count(), $category->author_count);
    }

    public function testWhetherWeCanReliablyConvertTheAuthorCountToWords(int $category_id = 1,
                                                                         int $author_count = 5,
                                                                         string $author_count_words = 'five')
    {
        $authors = User::factory($author_count)->create();
        $articles = Article::factory($this->randomNumber(50))->category($category_id);

        for ($i = 0; $i < $author_count; $i++) {
            $articles->user_id($i)->create();
        }

        $category = Category::find($category_id)->first();

        $this->assertEquals($author_count_words, $category->convertAuthorCountToWords());
    }
}
