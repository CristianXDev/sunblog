<?php

namespace App\Filament\Pages;

use App\Models\Post;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Livewire\Livewire;

class ViewPost extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.view-post';
    protected static string $routePath = 'view-post/{id}';
    protected static bool $shouldRegisterNavigation = false;

    public ?Post $post = null;
    public bool $postExists = true;

    public function mount($id): void
    {
        try {
            // Validar que el ID sea numérico
            if (!is_numeric($id)) {
                throw new NotFoundHttpException();
            }

            // Buscar el post con validación de publicación
            $this->post = Post::where('id', $id)
                ->where('is_published', true)
                ->firstOrFail();

        } catch (ModelNotFoundException $e) {
            $this->postExists = false;
            abort(404, 'El post solicitado no existe o no está publicado');
        } catch (\Exception $e) {
            $this->postExists = false;
            abort(404, 'Error al cargar el post');
        }
    }

    public function getPostProperty()
    {
        return $this->post;
    }

    // Método para determinar si mostrar la página o el error
    public function showError(): bool
    {
        return !$this->postExists || !$this->post;
    }
}