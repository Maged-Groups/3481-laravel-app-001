<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Database\Factories\PostStatusFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['type'])]
class PostStatus extends Model
{
    /** @use HasFactory<PostStatusFactory> */
    use HasFactory;

    // Relationships
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
