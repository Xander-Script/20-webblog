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
 * @property-read int|null $articles_count
 * @method static Builder|Category free()
 */
class Category extends Model
{
    use HasFactory, HasSlug;

    public function scopeFree(Builder $query): void
    {
        $query->where('premium', '=', false);
    }

    public function articles(): belongsToMany
    {
        // Avoid recursion
        return $this->belongsToMany(Article::class)
//            ->select('id', 'slug')
            ->without(['categories']);
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
