@extends('layouts.master')
@section('title','404 - Page Not Found | Luxury Homez')
@section('description','The page you are looking for might have been removed or is temporarily unavailable.')

@section('content')

@push('styles')
@vite([
    'frontend_assets/css/blogs.css',
    'frontend_assets/css/aresponsive.css'
])
@endpush

<!-- =================================================================================== -->
<!-- START: 404 ERROR SECTION (REDESIGNED)                                             -->
<!-- =================================================================================== -->
<section class="relative h-screen w-full flex items-center justify-center text-center text-white bg-navy-dark overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1582407947304-fd86f028f716?q=80&w=2070"
             alt="Luxury Home Interior"
             class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-black/70"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6 flex flex-col items-center" data-animate="fade-up">
        <!-- Large "404" text -->
        <h2 class="text-9xl md:text-[200px] font-display font-bold text-white/10 leading-none -mb-4 md:-mb-8">404</h2>
        
        <h1 class="font-display text-4xl md:text-6xl font-bold text-golden">
            Page Not Found
        </h1>
        
        <p class="max-w-lg mt-4 text-base md:text-lg text-gray-300 font-elegant">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>
        
        <a href="/" class="inline-block mt-8 bg-golden text-navy font-bold px-8 py-3 rounded-lg hover:bg-white hover:-translate-y-1 transition-all duration-300 font-display">
            Back to Homepage
        </a>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: 404 ERROR SECTION                                                            -->
<!-- =================================================================================== -->

@push('scripts')
{{-- No specific scripts needed for this page unless you add more complex animations --}}
@endpush

@stop
