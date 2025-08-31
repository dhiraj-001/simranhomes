@extends('layouts.master') 
@section('title', $keyword->text) 
@section('content') 

@push('styles')
@vite([
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/developers.css',
    'frontend_assets/css/property.css',
    'frontend_assets/css/fancybox.css',
    'frontend_assets/css/aresponsive.css'
])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
{{-- Alpine.js is used for the interactive FAQ accordion --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

<!-- =================================================================================== -->
<!-- START: HERO SLIDER SECTION (REDESIGNED)                                           -->
<!-- =================================================================================== -->
<section class="relative h-screen bg-navy-dark text-white">
    <div class="swiper keyword_slider h-full">
        <div class="swiper-wrapper">
            @foreach($properties as $property)
            <div class="swiper-slide relative">
                <img src="{{ asset('storage/' . $property->main_image) }}" alt="{{ $property->heading }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="container mx-auto px-6 text-center">
                        <h1 class="font-display text-4xl md:text-6xl font-bold text-white leading-tight">{{ $property->heading }}</h1>
                        <p class="font-elegant text-lg text-gray-300 mt-4">{{ $property->location }}</p>
                        <div class="mt-8 flex justify-center gap-4 text-sm font-elegant">
                            <span class="bg-white/10 text-white backdrop-blur-md text-md border border-white/70 px-4 py-2 rounded-full">Price: {{ $property->price }}</span>
                            <span class="bg-white/10 text-white backdrop-blur-md text-md border border-white/70 px-4 py-2 rounded-full">Size: {{ $property->unit_size ?? 'N/A' }}</span>
                            <span class="bg-white/10 text-white backdrop-blur-md text-md border border-white/70 px-4 py-2 rounded-full">{{ $property->configuration ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: HERO SLIDER SECTION                                                          -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: KEYWORD CONTENT & PROPERTIES GRID                                          -->
<!-- =================================================================================== -->
<section class="bg-white py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16" data-animate="fade-up">
                @php $headingParts = explode('||', $keyword->text); @endphp
                <h2 class="font-display text-4xl md:text-5xl text-navy-dark font-bold">
                    {{ $headingParts[0] ?? '' }}
                    @if(isset($headingParts[1]))
                        <span class="text-gold-accent">{{ $headingParts[1] }}</span>
                    @endif
                </h2>
                <div class="prose max-w-6xl mx-auto mt-4 text-gray-600 font-elegant text-sm">
                    {!! $keyword->content !!}
                </div>
            </div>

            <!-- Properties Grid -->
            @if($properties->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-10">
                @foreach($properties as $item)
                <div class="swiper-slide h-full">
                        <div class="bg-white rounded-lg overflow-hidden group h-full flex flex-col border hover:border-golden shadow-lg hover:shadow-xl transition-all duration-300">
                            <a href="{{ url('property/' . $item->slug) }}" class="block relative overflow-hidden">
                                <img src="{{ asset('storage/' . $item->main_image) }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" alt="{{$item->heading}}" />
                                @if($item->is_featured)
                                    <span class="absolute top-4 left-4 bg-golden text-white text-xs font-bold px-3 py-1 rounded-full">FEATURED</span>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            </a>
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="font-display text-xl text-navy font-bold mb-2 truncate">
                                    <a href="{{ url('property/' . $item->slug) }}" class="hover:text-golden transition">{{$item->heading}}</a>
                                </h3>
                                <p class="text-gray-500 text-sm mb-4 font-elegant">By {{ optional($item->builder)->name ?? 'N/A' }}</p>
                                <div class="space-y-3 text-gray-700">
                                    <p class="flex items-center text-sm"><span class="text-golden mr-2">&#9679;</span> {{ $item->location }}</p>
                                    <p class="flex items-center text-sm"><span class="text-golden mr-2">&#9679;</span> Price: {{ $item->price }}</p>
                                    <p class="flex items-center text-sm"><span class="text-golden mr-2">&#9679;</span> {{ $item->configuration }}</p>
                                </div>
                                <a href="{{ url('property/' . $item->slug) }}" class="inline-block mt-5 bg-navy text-white hover:bg-golden px-6 py-2 rounded-md font-display">
                                    Explore Project
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-20 border-2 border-dashed rounded-2xl">
                 <svg class="w-16 h-16 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                 <h4 class="mt-4 font-display text-2xl text-navy-dark">No Properties Found</h4>
                 <p class="mt-2 text-gray-500 font-elegant">No properties are currently associated with this keyword.</p>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: KEYWORD CONTENT & PROPERTIES GRID                                            -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: FAQ SECTION (REDESIGNED)                                                   -->
<!-- =================================================================================== -->
<section class="bg-gray-50 py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto" data-animate="fade-up">
            <div class="text-center mb-12">
                <h2 class="font-display text-4xl text-navy-dark font-bold">Frequently Asked <span class="text-gold-accent">Questions</span></h2>
            </div>
            @if($kfaqs->count() > 0)
            <div class="space-y-4">
                @foreach($kfaqs as $faq)
                <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="bg-white rounded-lg border border-gray-200">
                    <button @click="open = !open" class="w-full flex justify-between items-center text-left p-6">
                        <h5 class="font-display font-bold text-navy-dark">{{ $faq->question }}</h5>
                        <svg class="w-5 h-5 text-gold-accent transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-6 font-elegant text-gray-600 text-sm">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center text-gray-500">No FAQs available for this topic.</p>
            @endif
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: FAQ SECTION                                                                  -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: TESTIMONIALS SECTION                                                       -->
<!-- =================================================================================== -->
<x-testimonial-section 
    :testimonials="$testimonials" 
    :global-settings="$global_settings"
    gray-bg="false"
/>
<!-- =================================================================================== -->
<!-- END: TESTIMONIALS SECTION                                                         -->
<!-- =================================================================================== -->

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const keywordSlider = new Swiper('.keyword_slider', {
            loop: true,
            effect: 'fade',
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });

    function openModal(button) {
        // Your existing modal logic here
    }
</script>
@endpush 
@stop

