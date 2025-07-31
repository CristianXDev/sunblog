<?php

namespace App\Livewire;

use Livewire\Component;

//MODELO
use App\Models\Comment;

//Componente de autenificación
use Illuminate\Support\Facades\Auth;

class Comments extends Component{

    //Variables de los comentarios
    public $comentario, $comentario_update, $post_id, $selected_id;

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


    //Eliminar comentario
    public function destroy($id){

        if ($id){
            Comment::where('id', $id)->delete();
        }
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
