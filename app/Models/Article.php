<?php

namespace App\Models;

use App\Extensions\Auth;
use Database\Factories\ArticleFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property int $draft
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $premium
 * @property string $slug
 * @property-read Category|null $category
 * @property-read User $user
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @method static ArticleFactory factory(...$parameters)
 * @method static Builder|Article newModelQuery()
 * @method static Builder|Article newQuery()
 * @method static Builder|Article query()
 * @method static Builder|Article whereBody($value)
 * @method static Builder|Article whereCategoryId($value)
 * @method static Builder|Article whereCreatedAt($value)
 * @method static Builder|Article whereDraft($value)
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article whereTitle($value)
 * @method static Builder|Article whereUpdatedAt($value)
 * @method static Builder|Article whereUserId($value)
 * @method static Builder|Article published()
 * @method static Builder|Article whereSlug($value)
 * @method static Builder|Article wherePremium($value)
 * @method static Builder|Article premium()
 * @method static Builder|Article between(array $values)
 * @mixin Eloquent
 * @method static Builder|Article free()
 */
class Article extends Model
{
    use HasFactory, HasSlug;

    /**
     * @var string[]
     */
    protected $casts = [
        'published_at' => 'datetime'
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'categories',
        'user',
    ];

    /**
     * @var int[]
     */
    protected $attributes = [
        'user_id' => 1,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): belongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopePremium(Builder $query): void
    {
        $query->where('premium', '=', true);
    }

    public function scopeFree(Builder $query): void
    {
        $query->where('premium', '=', false);
    }

    public function scopeBetween(Builder $query, array $values): void
    {
        $query->whereBetween('created_at', $values);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->preventOverwrite();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
