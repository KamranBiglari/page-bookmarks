<?php

namespace JaysonTemporas\PageBookmarks;

use Filament\Contracts\Plugin;
use Filament\Panel;

class PageBookmarksPlugin implements Plugin
{
    public function getId(): string
    {
        return 'jaysontemporas-page-bookmarks';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([

            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return new static;
    }
}
