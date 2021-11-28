<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class HTTPArticleResource extends TestCase
{
    public function testSingularArticleRouteReturnsPermanentRedirectStatusCode()
    {
        $redirect = $this->get('/article');
        $redirect->assertStatus(Response::HTTP_PERMANENTLY_REDIRECT);
        $redirect->assertRedirect('/articles');
    }

    public function testArticleOverviewPageReturnsOkStatusCode()
    {
        $response = $this->get('/articles');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testSingleArticlePageReturnsOkStatusCode()
    {
        $article = Article::factory(1)->create()->first();

        $response = $this->get('/article/'.$article->slug);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testInvalidArticleReturnsNotFoundStatusCode()
    {
        $response = $this->get('/article/this-slug-should-not-be-found');
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testPremiumArticleReturnsPaymentRequiredStatusCode()
    {
        $article = Article::factory(1)->premium()->create()->first();

        $response = $this->get('/article/'.$article->slug);
        $response->assertStatus(Response::HTTP_PAYMENT_REQUIRED);
    }

    public function testPremiumUserCanAccessPremiumAndStandardArticles()
    {
        $user = User::factory(1)->premium()->create()->first();
        $art = Article::factory(1);

        $responses = [
            // standard article:
            Response::HTTP_OK => $art,
            // premium article:
            Response::HTTP_PAYMENT_REQUIRED => $art->premium(),
        ];

        foreach ($responses as $response => $article) {
            $article = $article->create()->first();
            $this->actingAs($user)->get('/article/'.$article->slug)->assertStatus($response);
        }
    }
}
