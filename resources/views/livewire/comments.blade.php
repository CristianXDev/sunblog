<div class="space-y-6 mt-4">

    <!--alertas-->
    @livewire('notifications')


    <!--Modeles-->
    <x-filament-actions::modals />

     <!-- Formulario para añadir comentario -->
    <div class="fi-card rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Deja tu comentario</h3>
        <form wire:submit.prevent="store">
            <div class="space-y-4">
                <div>
                    <label for="comentario" class="block text-sm font-medium text-gray-700 dark:text-gray-300 sr-only">Comentario</label>
                    <textarea
                        wire:model="comentario"
                        id="comentario"
                        rows="3"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                        placeholder="Escribe tu comentario..."
                    ></textarea>
                    @error('comentario') <span class="mt-2 text-sm text-danger-600 dark:text-danger-500">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-900">
                        Publicar comentario
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Lista de comentarios -->
    <div class="space-y-4">
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Comentarios</h3>
        
        @forelse($comments as $comment)
            <div 
                wire:key="comment-{{ $comment->id }}"
                class="fi-card rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">

                <div class="flex items-start justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="{{ Storage::url($comment->user->avatar_url) }}" alt="{{ $comment->user->name }}">
                        </div>
                        <div class="ml-8"> <!-- Cambiado de ml-6 a ml-8 (2rem/32px) -->
                            <p class="text-sm font-medium font-bold text-gray-900 dark:text-gray-200">{{ $comment->user->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    
                    @if(auth()->id() === $comment->user_id)
                        <div class="flex space-x-2">

                            <button 
                                wire:click="edit({{ $comment->id }})"
                                class="text-gray-400 hover:text-primary-500 dark:hover:text-primary-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>


                            {{ ($this->deleteAction)(['post' => $comment->id]) }}

                        </div>
                    @endif
                </div>
                
                @if($selected_id == $comment->id)
                    <div class="mt-4">
                        <textarea
                            wire:model="comentario_update"
                            rows="3"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                        ></textarea>
                        @error('comentario_update') <span class="mt-2 text-sm text-danger-600 dark:text-danger-500">{{ $message }}</span> @enderror
                        
                        <div class="flex justify-end space-x-2 mt-2">
                            <button
                                wire:click="resetInput"
                                class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-700 dark:focus:ring-offset-gray-900"
                            >
                                Cancelar
                            </button>
                            <button
                                wire:click="update"
                                class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-900"
                            >
                                Actualizar
                            </button>
                        </div>
                    </div>
                @else
                    <div class="mt-3 text-sm text-gray-700 dark:text-gray-300">
                        {{ $comment->content }}
                    </div>
                @endif
            </div>
        @empty
            <div class="fi-card rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 text-center text-gray-500 dark:bg-gray-900 dark:ring-white/10 dark:text-gray-400">
                No hay comentarios aún. Sé el primero en comentar.
            </div>
        @endforelse
    </div>
</div>