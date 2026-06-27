<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

// #[Guarded(['id'])]
#[Fillable(['title', 'body', 'user_id', 'post_status_id'])]
class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory, SoftDeletes;

    // protected $guarded = [
    //     'id',
    // ];

    // protected $fillable = [
    //     'title',
    //     'body',
    //     'user_id',
    //     'post_status_id',
    // ];

    public const POST_KEY = 'posts_key';
    public const POST_EXPIRATION = 60 * 60 * 24 * 30; // 30 days

    public function getPostsKey(): string
    {
        return $this->posts_key;
    }

    public function getPostsExpiration(): int
    {
        return $this->posts_expiration;
    }

    // Relationships
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function postStatus(): BelongsTo
    {
        return $this->belongsTo(PostStatus::class);
    }

    public function reactions(): MorphMany
    {
        return $this->morphMany(Reaction::class, 'reactable');
    }
}
