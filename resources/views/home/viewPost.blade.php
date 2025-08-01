@extends('layouts.home')

@section('title', $post->title . ' | Sun Blog')

@section('content')
<!-- Partículas flotantes -->
<div class="sun-particles" id="particles"></div>

<!-- Gradiente radial para efecto solar -->
<div class="fixed inset-0 sun-gradient pointer-events-none"></div>

<div class="container mx-auto px-4 py-12 min-h-screen relative z-10">
    <!-- Botón de volver -->
    <div class="mb-6">
        <a href="{{ route('home-blog') }}" class="sun-button inline-flex items-center  hover:text-sun-secondary transition-colors px-8 py-4 rounded-full font-bold text-lg animate-entry delay-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Volver al blog
        </a>
    </div>

    <!-- Contenido del post -->
    <article class="max-w-4xl mx-auto">
        <!-- Encabezado -->
        <header class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold px-2 py-1 rounded-full bg-sun-primary/10 text-sun-primary">
                    {{ $post->category->name }}
                </span>
                <span class="text-xs text-gray-400">
                    {{ $post->published_at->format('d M, Y') }}
                </span>
            </div>
            
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $post->title }}</h1>
            
            <div class="flex items-center">
                <div class="h-10 w-10 rounded-full bg-sun-primary/20 flex items-center justify-center text-sun-primary text-sm font-bold mr-3">
                    {{ substr($post->user->name, 0, 1) }}
                </div>
                <div>
                    <p class="text-sm text-gray-300">{{ $post->user->name }}</p>
                    <p class="text-xs text-gray-500">Publicado hace {{ $post->published_at->diffForHumans() }}</p>
                </div>
            </div>
        </header>

        <!-- Imagen destacada -->
        @if($post->image)
        <div class="mb-8 rounded-xl overflow-hidden">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto max-h-96 object-cover">
        </div>
        @endif

        <!-- Contenido -->
        <div class="prose prose-invert max-w-none">
            {!! $post->content !!}
        </div>

        <!-- Tags (si los tienes) -->
        @if($post->tags && $post->tags->count() > 0)
        <div class="mt-8 pt-6 border-t border-sun-primary/20">
            <h3 class="text-sm font-semibold text-gray-400 mb-2">Etiquetas:</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($post->tags as $tag)
                <span class="text-xs px-3 py-1 rounded-full bg-sun-dark/50 text-gray-300 border border-sun-primary/20">
                    {{ $tag->name }}
                </span>
                @endforeach
            </div>
        </div>
        @endif


        <!-- Botón de volver -->
        <div class="mt-6">
            <a href="{{ route('home-blog') }}" class="sun-button inline-flex items-center  hover:text-sun-secondary transition-colors px-8 py-4 rounded-full font-bold text-lg animate-entry delay-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Volver al blog
            </a>
        </div>

    </article>

    <!-- Comentarios -->
    @if($post->comments->count() > 0)
    <section class="mt-12 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-white mb-6">Comentarios ({{ $post->comments->count() }})</h2>
        
        <div class="space-y-6">
            @foreach($post->comments as $comment)
            <div class="bg-sun-darker/50 rounded-lg p-4 border border-sun-primary/20">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-sun-primary/20 flex items-center justify-center text-sun-primary text-sm font-bold">
                            {{ substr($comment->user->name, 0, 1) }}
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="font-medium text-gray-300">{{ $comment->user->name }}</h4>
                            <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-300 whitespace-pre-line">{{ $comment->content }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @else
    <section class="mt-12 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-white mb-6">Comentarios</h2>
        <div class="bg-sun-darker/50 rounded-lg p-8 text-center border border-sun-primary/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <p class="text-gray-400">No hay comentarios todavía. Sé el primero en comentar cuando se habilite esta función.</p>
        </div>
    </section>
    @endif


    <!-- Posts recientes -->
    @if($recentPosts->count() > 0)
    <section class="mt-16 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-white mb-6">Artículos recientes</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($recentPosts as $recent)
            <div class="card-hover bg-sun-darker/70 backdrop-blur-sm rounded-xl overflow-hidden border border-sun-primary/30 transition-all duration-300 hover:border-sun-primary/50">
                @if($recent->image)
                <div class="h-40 overflow-hidden">
                    <img src="{{ asset('storage/' . $recent->image) }}" alt="{{ $recent->title }}" class="w-full h-full object-cover">
                </div>
                @endif
                <div class="p-4">
                    <span class="text-xs font-semibold px-2 py-1 rounded-full bg-sun-primary/10 text-sun-primary mb-2 inline-block">
                        {{ $recent->category->name }}
                    </span>
                    <h3 class="text-lg font-bold mb-2 text-white hover:text-sun-primary transition-colors">
                        <a href="{{ route('home-post', $recent->id) }}">{{ $recent->title }}</a>
                    </h3>
                    <a href="{{ route('home-post', $recent->id) }}" class="text-sun-primary text-sm font-medium hover:underline flex items-center">
                        Leer más
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Footer -->
    <div class="mt-16 text-center text-gray-400 text-sm">
        <p>©2025 SUNBLOG. Todos los derechos reservados.</p>
        <p class="mt-2">Iluminando mentes desde el amanecer de internet</p>
    </div>
</div>
@endsection