<?php

namespace Tests\Feature;

use App\Models\Article;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HTTPArticleResource extends TestCase
{
    public function testSingularArticleRouteReturnsPermanentRedirectStatusCode()
    {
        $redirect = $this->get('/article');
        $redirect->assertStatus(308);
        $redirect->assertRedirect('/articles');
    }

    public function testArticleOverviewPageReturnsOkStatusCode()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
    }

    public function testSingleArticlePageReturnsOkStatusCode()
    {
        $article = Article::factory(1)->create()->first();

        $response = $this->get('/article/'.$article->slug);
        $response->assertStatus(200);
    }

    public function testInvalidArticleReturnsNotFoundStatusCode()
    {
        $response = $this->get('/article/this-slug-should-not-be-found');
        $response->assertStatus(404);
    }

    public function testPremiumArticleReturnsPaymentRequiredStatusCode()
    {
        $article = Article::factory(1)->premium()->create()->first();

        $response = $this->get('/article/'.$article->slug);
        $response->assertStatus(402);
    }
}
