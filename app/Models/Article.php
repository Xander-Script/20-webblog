<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

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
 * @mixin Eloquent
 */
class Article extends Model
{
    use HasFactory;

    protected $attributes = [
        'user_id' => 1,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault(function ($user, $post) {
            return User::find(1); // Guest User.
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault(function ($category, $post) {
            $category = Category::find(1);
        });
    }
}
