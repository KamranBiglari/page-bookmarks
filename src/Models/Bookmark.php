<?php

namespace JaysonTemporas\PageBookmarks\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bookmark extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'bookmark_folder_id',
        'url',
    ];

    public function getTable(): string
    {
        return config('page-bookmarks.tables.bookmarks', 'bookmarks');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('page-bookmarks.models.user', config('auth.providers.users.model')));
    }

    public function folder(): BelongsTo
    {
        return $this->belongsTo(BookmarkFolder::class, 'bookmark_folder_id');
    }
}
