<?php

namespace JaysonTemporas\PageBookmarks\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookmarkFolder extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('page-bookmarks.models.user', config('auth.providers.users.model')));
    }

    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class, 'bookmark_folder_id');
    }
}
