<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @mixin IdeHelperArticle
 */
class Article extends Model
{
    use HasFactory, HasSlug;

    /**
     * @var string[]
     */
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'categories',
        'user',
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
