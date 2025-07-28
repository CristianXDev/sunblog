<?php

namespace App\Filament\Pages;

use App\Models\Post;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Blog extends Page
{
    protected static string $view = 'filament.pages.blog';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public function getTitle(): string|Htmlable
    {
        return __('Blog');
    }

    public static function getNavigationLabel(): string
    {
        return __('Blog');
    }

    public function mount(): void
    {
        // Puedes agregar lógica adicional aquí si es necesario
    }

    public function getPosts()
    {
        return Post::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(6);
    }
}