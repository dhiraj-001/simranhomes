@extends('layouts.master')
@section('title','Thank You | Luxury Homez')
@section('description','Your submission has been received. We will get back to you shortly.')
@section('content')

@push('styles')
@vite([
    'frontend_assets/css/blogs.css',
    'frontend_assets/css/aresponsive.css'
])
@endpush

<!-- =================================================================================== -->
<!-- START: THANK YOU SECTION (REDESIGNED)                                             -->
<!-- =================================================================================== -->
<section class="relative h-screen flex items-center justify-center text-white text-center bg-navy overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1582407947304-fd86f028f716?q=80&w=1992" 
             alt="Luxury Home Interior" 
             class="w-full h-full object-cover opacity-20">
    </div>
    <!-- Darkening Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-navy via-navy/80 to-navy z-10"></div>

    <!-- Content -->
    <div class="relative z-20 container mx-auto px-6 flex flex-col items-center" data-animate="fade-up">
        <!-- Success Icon -->
        <div class="w-20 h-20 bg-gold-accent/10 border-2 border-gold-accent rounded-full flex items-center justify-center mb-6">
            <svg class="w-10 h-10 text-gold-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="font-display text-5xl md:text-7xl font-bold text-white leading-tight">
            Thank You!
        </h1>
        <p class="font-elegant text-lg text-gray-300 mt-4 max-w-xl">
            Your query has been successfully submitted. Our team will review your message and get back to you shortly with an update.
        </p>
        <a href="/" 
           class="inline-block mt-10 bg-gold-accent text-white bg-slate-700 font-bold px-8 py-3 rounded-lg hover:bg-white hover:text-navy hover:-translate-y-1 transition-all duration-300 font-display">
            Back to Home
        </a>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: THANK YOU SECTION                                                            -->
<!-- =================================================================================== -->

@push('scripts')
@endpush

@stop
