<x-filament-panels::page>
<div class="w-full max-w-4xl mx-auto px-4 py-8">
    <!-- Encabezado del post -->
    <div class="mb-8">
        <!-- Categoría -->
        <div class="mb-2">
            <span class="inline-block px-3 py-1 text-sm font-semibold text-primary-600 bg-primary-100 rounded-full">
                {{ $post->category->name }}
            </span>
        </div>
        
        <!-- Título -->
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
            {{ $post->title }}
        </h1>
        
        <!-- Metadatos del autor y fecha -->
        <div class="flex items-center gap-4 text-gray-600 dark:text-gray-300 mb-4">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">
                    <span class="text-sm font-medium">
                        {{ substr($post->user->name, 0, 1) }}
                    </span>
                </div>
                <span class="text-sm">{{ $post->user->name }}</span>
            </div>
            <span class="text-sm">•</span>
            <span class="text-sm">
                {{ $post->published_at->format('d M, Y') }}
            </span>
            <span class="text-sm">•</span>
            <span class="text-sm">
                {{ $post->published_at->diffForHumans() }}
            </span>
        </div>
    </div>
    
    <!-- Imagen destacada -->
    @if($post->image)
    <div class="mb-8 rounded-lg overflow-hidden shadow-lg">
        <img 
            src="{{ asset('storage/' . $post->image) }}" 
            alt="{{ $post->title }}" 
            class="w-full h-auto object-cover"
        >
    </div>

    @else

    <div class="w-full h-48 bg-gray-100 dark:bg-gray-700 flex items-center justify-center rounded-t-xl mb-8">
    	<svg class="w-16 h-16 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
    	</svg>
    </div>

    @endif
    
    <!-- Contenido del post -->
    <article class="prose max-w-none dark:prose-invert prose-lg mb-4">
        {!! Str::markdown($post->content) !!}
    </article>
    
    <!-- Botón de volver -->
    <div class="mt-8">
        <a 
            href="../blog"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-colors duration-200"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Volver al blog
        </a>
    </div>
</div>
</x-filament-panels::page>
