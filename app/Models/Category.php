<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Eloquent;
use HnhDigital\LaravelNumberConverter\Facade as NumConvert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int|null $categories_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $description
 * @property int|null $article_count
 * @property int|null $author_count
 * @property-read Collection|Article[] $articles
 * @property-read int|null $articles_count
 * @method static CategoryFactory factory(...$parameters)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereArticleCount($value)
 * @method static Builder|Category whereAuthorCount($value)
 * @method static Builder|Category whereCategoriesId($value)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory;

    public function convertArticleCountToWords(): string
    {
        return NumConvert::word($this->article_count);
    }

    public function convertAuthorCountToWords(): string
    {
        return NumConvert::word($this->author_count);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
