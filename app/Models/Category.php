<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int|null $categories_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $description
 * @property-read Collection|Article[] $articles
 * @property string $slug
 * @method static CategoryFactory factory(...$parameters)
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCategoriesId($value)
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDescription($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @method static Builder|Category whereSlug($value)
 * @mixin Eloquent
 */
class Category extends Model
{
    use HasFactory, HasSlug;

    public static function booted()
    {
        // This tiny piece of madness will result in `free_articles_count` and `premium_articles_count`
        foreach ([0 => 'free', 1 => 'premium'] as $premium => $type) {
            static::addGlobalScope($type.'_articles_count', function (Builder $query) use ($premium, $type) {
                $query->withCount(['articles as '.$type.'_article_count' => function (Builder $q) use ($premium) {
                    $q->withoutGlobalScope('guest');
                    $q->where('premium', '=', $premium);
                }]);
            });
        }
    }

    public function articles(): belongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->preventOverwrite();
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
