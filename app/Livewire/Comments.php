<?php

namespace App\Livewire;

use Livewire\Component;

//Modelo
use App\Models\Comment;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

//Componentes Filament
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;

class Comments extends Component implements HasForms, HasActions{

    use InteractsWithActions;
    use InteractsWithForms;

    //Variables de los comentarios
    public $comentario, $comentario_update, $post_id, $selected_id;

    public Post $post;

    public function render(){

        $comments = Comment::where('post_id', $this->post_id)
        ->with('user')
        ->latest()
        ->get();
        
        return view('livewire.comments', compact('comments'));
    }

    //Guardar comentario
    public function store(){

        //Validar datos
        $this->validate([
            'comentario' => 'required',
        ]);

        //Guardar el comentario
        Comment::create([ 
            'content' => $this->comentario,
            'user_id' => Auth::user()->id,
            'post_id' => $this->post_id,
        ]);

        Notification::make()
        ->title('Su comentario a sido publicado')
        ->success()
        ->send();

        //Resetear campos
        $this->resetInput();

    }

    //Editar comentario
    public function edit($id){
        $record = Comment::findOrFail($id);
        $this->selected_id = $id; 
        $this->comentario_update = $record->content;
    }

    //Actualizar comentario
    public function update(){

        $this->validate([
            'comentario_update' => 'required',
        ]);

        if ($this->selected_id){

            $record = Comment::find($this->selected_id);
            $record->update([ 
                'content' => $this->comentario_update,
                'user_id' => Auth::user()->id,
                'post_id' => $this->post_id,
            ]);

            //Resetear campos
            $this->resetInput();
        }
    }

    //Borrar comentario
    public function deleteAction(): Action{

        return Action::make('delete')
        ->icon('heroicon-m-trash')
        ->iconButton()
        ->requiresConfirmation()
        ->action(function (array $arguments){

            $post = Comment::find($arguments['post']);
            $post?->delete();
        });


        Notification::make()
        ->title('El comentario a sido eliminado')
        ->danger()
        ->send();
    }

    //Resetar inputs
    public function resetInput(){

        $this->comentario = null;
        $this->comentario_update = null;
        $this->selected_id = null;
    }

    //Establecer valores
    public function mount($id){

        //Guardar el id del post
        $this->post_id = $id;

    }

}
