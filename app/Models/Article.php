<?php

namespace App\Models;

use App\Extensions\Auth;
use Database\Factories\ArticleFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @property int|null $category_id
 * @property int $premium
 * @property string $slug
 * @property-read Category|null $category
 * @property-read User $user
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
 * @mixin Eloquent
 */
class Article extends Model
{
    use HasFactory, HasSlug;

    /**
     * @var string[]
     */
    protected $with = [
        'category',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function booted()
    {
        static::addGlobalScope('guest', function (Builder $builder) {
            if (! Auth::userIsPremium()) {
                $builder->where('premium', '!=', true);
            }
        });
        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where('draft', '!=', true);
        });
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
