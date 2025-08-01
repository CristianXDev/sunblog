@extends('layouts.home')

@section('title', 'Sun Blog - Ilumina tus ideas')

@section('content')

<!-- Particles -->
<div class="sun-particles" id="particles"></div>

<!-- Solar Effect -->
<div class="fixed inset-0 sun-gradient pointer-events-none"></div>

<div class="container mx-auto px-4 py-12 min-h-screen flex flex-col items-center justify-center relative z-10">

<!-- Animated logo -->
<div class="animate-rotate-slow mb-8">
    <svg class="h-24 w-24 text-sun-secondary sun-logo" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 2L4 12l8 10 8-10z" />
        <path d="M12 6l6 6-6 6-6-6z" fill="#1E1E2A" />
    </svg>
</div>

<!-- Main title -->
<h1 class="text-5xl md:text-7xl font-bold mb-4 text-center animate-entry">
    <span class="text-sun-secondary">SUN</span>BLOG
</h1>

<!-- Caption -->
<p class="text-xl md:text-2xl text-sun-secondary mb-12 text-center max-w-2xl animate-entry delay-1">
    Donde las ideas brillan con luz propia
</p>

<!-- Description -->
<div class="bg-sun-darker/70 backdrop-blur-sm rounded-2xl p-8 mb-12 max-w-3xl  border-sun-primary/30 animate-entry delay-2">
    <p class="text-lg text-center leading-relaxed">
        SunBlog es un proyecto demostrativo desarrollado con Laravel, Livewire y Filament. Más que un blog tradicional, funciona como un showcase técnico donde aplico prácticas de desarrollo, arquitectura limpia y herramientas avanzadas como las mencionadas anteriormente.
    </p>
</div>

<div class="d-flex">
    <!-- Buttton -->
    <a href="/dashboard/login" class="sun-button px-8 py-4 rounded-full font-bold text-lg animate-entry delay-3">
        Iniciar sesión
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </a>

    <!-- Buttton -->
    <a href="/blog" class="sun-button px-8 py-4 rounded-full font-bold text-lg animate-entry delay-3 ml-3">
        Ver Blog
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </a>
</div>

<!-- Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-24 w-full max-w-6xl">
    <div class="card-hover bg-sun-darker/70 backdrop-blur-sm rounded-2xl p-6 border border-sun-primary/30">
        <div class="text-sun-primary mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Inspiración técnica</h3>
        <p class="text-gray-300">Implementación de soluciones innovadoras con Laravel y Livewire que demuestran mi capacidad para resolver problemas complejos.</p>
    </div>

    <div class="card-hover bg-sun-darker/70 backdrop-blur-sm rounded-2xl p-6 border border-sun-primary/30">
        <div class="text-sun-primary mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Arquitectura escalable</h3>
        <p class="text-gray-300">Diseño modular y bien estructurado que muestra mi enfoque en código mantenible y escalable para proyectos de cualquier tamaño.</p>
    </div>

    <div class="card-hover bg-sun-darker/70 backdrop-blur-sm rounded-2xl p-6 border border-sun-primary/30">
        <div class="text-sun-primary mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Comunidad de desarrolladores</h3>
        <p class="text-gray-300">Plataforma para compartir conocimiento técnico y conectar con otros profesionales del desarrollo web.</p>
    </div>
</div>

<!-- Footer -->
<div class="mt-24 text-center text-gray-400 text-sm">
    <p>©2025 SUNBLOG. Todos los derechos reservados.</p>
    <p class="mt-2">Iluminando mentes desde el amanecer de internet</p>
</div>
</div>

@endsection
