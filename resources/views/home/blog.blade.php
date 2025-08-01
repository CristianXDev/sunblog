@extends('layouts.home')

@section('title', 'Sun Blog - Blog')

@section('content')

<!-- Particles -->
<div class="sun-particles" id="particles"></div>

<!-- Solar Effect -->
<div class="fixed inset-0 sun-gradient pointer-events-none"></div>

<div class="container mx-auto px-4 py-12 min-h-screen relative z-10">

    <!-- Animated logo -->
    <div class="text-center mb-12">
        <div class="animate-rotate-slow mb-4 inline-block">
            <svg class="h-16 w-16 text-sun-secondary sun-logo" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L4 12l8 10 8-10z" />
                <path d="M12 6l6 6-6 6-6-6z" fill="#1E1E2A" />
            </svg>
        </div>
        <h1 class="text-4xl md:text-5xl font-bold mb-2 animate-entry">
            <span class="text-sun-secondary">BLOG</span> POSTS
        </h1>
        <p class="text-lg text-sun-secondary animate-entry delay-1">
            Explora nuestros últimos artículos
        </p>
    </div>

    <!-- List of posts -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

        @forelse($posts as $post)

            <div class="card-hover bg-sun-darker/70 backdrop-blur-sm rounded-xl overflow-hidden border border-sun-primary/30 transition-all duration-300 hover:border-sun-primary/50 hover:shadow-lg hover:shadow-sun-primary/10">

                @if($post->image)
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                @endif

                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-semibold px-2 py-1 rounded-full bg-sun-primary/10 text-sun-primary">
                            {{ $post->category->name }}
                        </span>
                        <span class="text-xs text-gray-400">
                            {{ $post->published_at->format('d M, Y') }}
                        </span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-white hover:text-sun-primary transition-colors">
                        <a href="{{ route('home-post', ['id' => $post->id]) }}">{{ $post->title }}</a>
                    </h3>
                    <p class="text-gray-300 mb-4 line-clamp-2">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-8 w-8 rounded-full bg-sun-primary/20 flex items-center justify-center text-sun-primary text-xs font-bold">
                                {{ substr($post->user->name, 0, 1) }}
                            </div>
                            <span class="ml-2 text-sm text-gray-300">{{ $post->user->name }}</span>
                        </div>
                        <a  href="{{ route('home-post', ['id' => $post->id]) }}" class="text-sun-primary text-sm font-medium hover:underline flex items-center">
                            Leer más
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        @empty

            <div class="col-span-3 text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-xl font-medium text-gray-400 mb-2">No hay posts disponibles</h3>
                <p class="text-gray-500">Parece que no hay artículos publicados todavía.</p>
            </div>

        @endforelse
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())

        <div class="mt-8">
            {{ $posts->links() }}
        </div>

    @endif

    <!-- Back button -->
    <div class="mb-6 mx-auto">
        <a href="{{ route('home') }}" class="sun-button inline-flex items-center  hover:text-sun-secondary transition-colors px-8 py-4 rounded-full font-bold text-lg animate-entry delay-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Volver al blog
        </a>
    </div>

    <!-- Footer -->
    <div class="mt-16 text-center text-gray-400 text-sm">
        <p>©2025 SUNBLOG. Todos los derechos reservados.</p>
        <p class="mt-2">Iluminando mentes desde el amanecer de internet</p>
    </div>
</div>
@endsection