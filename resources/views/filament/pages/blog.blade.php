<x-filament::page>
    <!-- Encabezado del blog -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
            Nuestro Blog
        </h1>
        <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
            Descubre las últimas publicaciones
        </p>
    </div>

    <!-- Grid de posts -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($this->getPosts() as $post)
            <div class="overflow-hidden rounded-lg shadow-lg dark:bg-gray-800 hover:shadow-xl transition-shadow duration-300">
                <!-- Imagen del post -->
                @if($post->image)
                    <img 
                        src="{{ asset('storage/' . $post->image) }}" 
                        alt="{{ $post->title }}"
                        class="w-full h-48 object-cover"
                    >
                @else
                    <div class="w-full h-48 bg-gray-100 dark:bg-gray-700 flex items-center justify-center rounded-t-xl">
                        <svg class="w-16 h-16 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif

                <!-- Contenido del post -->
                <div class="p-6">

                    <!-- Categoría -->
                    <span class="inline-block px-3 py-1 text-xs font-semibold tracking-wider text-primary-600 dark:text-primary-400 uppercase rounded-full bg-primary-50 dark:bg-gray-700">
                        {{ $post->category->name }}
                    </span>

                    <!-- Título -->
                    <h2 class="mt-2 text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $post->title }}
                    </h2>

                    <!-- Fecha y autor -->
                    <div class="flex items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                        <span>{{ $post->published_at->format('d M Y') }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $post->user->name }}</span>
                    </div>

                    <!-- Botón para leer más -->
                    <div class="mt-4">
                    <a 
                           href="{{ route('view-post', ['id' => $post->id]) }}"
                           class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-primary-600 rounded-lg shadow-md 
                           hover:bg-primary-700 hover:shadow-lg transition-all duration-200 
                           dark:bg-primary-500 dark:hover:bg-primary-600 group">
                           Leer más 
                           <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-8">
        {{ $this->getPosts()->links() }}
    </div>
</x-filament::page>