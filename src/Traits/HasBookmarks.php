<?php

namespace JaysonTemporas\PageBookmarks\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use JaysonTemporas\PageBookmarks\Models\Bookmark;
use JaysonTemporas\PageBookmarks\Models\BookmarkFolder;

trait HasBookmarks
{
    /**
     * Get all bookmarks for the user.
     */
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    /**
     * Get all bookmark folders for the user.
     */
    public function bookmarkFolders(): HasMany
    {
        return $this->hasMany(BookmarkFolder::class);
    }

    /**
     * Get bookmarks that are not in any folder (root level bookmarks).
     */
    public function rootBookmarks(): HasMany
    {
        return $this->bookmarks()->whereNull('bookmark_folder_id');
    }

    /**
     * Create a new bookmark folder for the user.
     */
    public function createBookmarkFolder(array $attributes = []): BookmarkFolder
    {
        return $this->bookmarkFolders()->create($attributes);
    }

    /**
     * Create a new bookmark for the user.
     */
    public function createBookmark(array $attributes = []): Bookmark
    {
        return $this->bookmarks()->create($attributes);
    }

    /**
     * Get bookmarks in a specific folder.
     */
    public function bookmarksInFolder(BookmarkFolder $folder): HasMany
    {
        return $this->bookmarks()->where('bookmark_folder_id', $folder->id);
    }

    /**
     * Get bookmarks in a specific folder by folder ID.
     */
    public function bookmarksInFolderById(int $folderId): HasMany
    {
        return $this->bookmarks()->where('bookmark_folder_id', $folderId);
    }

    /**
     * Check if user has any bookmarks.
     */
    public function hasBookmarks(): bool
    {
        return $this->bookmarks()->exists();
    }

    /**
     * Check if user has any bookmark folders.
     */
    public function hasBookmarkFolders(): bool
    {
        return $this->bookmarkFolders()->exists();
    }

    /**
     * Get the total count of bookmarks for the user.
     */
    public function getBookmarksCount(): int
    {
        return $this->bookmarks()->count();
    }

    /**
     * Get the total count of bookmark folders for the user.
     */
    public function getBookmarkFoldersCount(): int
    {
        return $this->bookmarkFolders()->count();
    }
}
