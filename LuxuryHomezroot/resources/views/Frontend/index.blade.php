@extends('layouts.master')

@section('title', 'Simran Home Solution - Premier Real Estate')
@section('description', 'Discover luxury properties and exclusive real estate opportunities with Simran Home Solution.')

@push('styles')
<style>
    /* Animation Styles */
    [data-animate] {
        opacity: 0;
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        will-change: transform, opacity;
    }
    [data-animate="fade-up"] {
        transform: translateY(40px);
    }
    [data-animate].is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    /* Custom Swiper Pagination */
    .testimonial-pagination .swiper-pagination-bullet,
    .propdots .swiper-pagination-bullet {
        background-color: #0A2342;
        opacity: 0.5;
    }
    .testimonial-pagination .swiper-pagination-bullet-active,
    .propdots .swiper-pagination-bullet-active {
        background-color: #D4AF37; /* golden */
        opacity: 1;
    }
    /* Custom Tabs Styling */
    .tab-item {
        transition: all 0.3s ease;
    }
    .tab-item.active {
        color: #D4AF37; /* golden */
        border-bottom-color: #D4AF37;
    }
    .tab-content {
        display: none;
    }
    .tab-content.active {
        display: grid;
    }
    
    /* Enhanced Tab Styling for Rounded Tabs */
    .tab-item {
        background-color: transparent;
        color: #6B7280;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .tab-item:hover {
        color: #0A2342;
        background-color: rgba(212, 175, 55, 0.1);
    }
    .tab-item.active {
        color: white;
        background-color: #0A2342;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    /* New Hover Overlay for Property Types */
    .property-card-overlay::after {
        content: '';
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.2);
        transform: translateX(100%);
        transition: transform 0.4s ease-in-out;
        z-index: 1;
    }
    .group:hover .property-card-overlay::after {
        transform: translateX(0);
    }
    /* Custom Navigation Arrow Styles */
    .pro-prev, .pro-next {
        position: absolute;
        bottom: 48px; /* Aligns with the bottom of the swiper-wrapper's padding */
        top: auto;
        width: 44px;
        height: 44px;
        background-color: white;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        z-index: 10;
        transition: all 0.3s ease;
    }
    .pro-prev:hover, .pro-next:hover {
        background-color: #f0f0f0;
        transform: translateY(-2px);
    }
    .pro-prev::after, .pro-next::after {
        font-size: 18px;
        font-weight: bold;
        color: #0A2342; /* navy */
    }
    .pro-prev {
        left: 50%;
        transform: translateX(-160%);
    }
    .pro-next {
        right: 50%;
        transform: translateX(160%);
    }

 @keyframes scroll-left {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

 @keyframes scroll-right {
    0% {
        transform: translateX(-50%);
    }
    100% {
        transform: translateX(0);
    }
}

.animate-scroll-left {
    animation: scroll-left 30s linear infinite;
}

.animate-scroll-right {
    animation: scroll-right 30s linear infinite;
}

/* Pause animation on hover */
.animate-scroll-left:hover,
.animate-scroll-right:hover {
    animation-play-state: paused;
}
</style>
@endpush

@section('content')

<!-- Hero Section -->
<div class="relative h-[90vh] bg-navy text-white overflow-hidden">
    {{-- Background Video or Image --}}
    @if($banner && $banner->type === 'video' && $banner->video)
        <video playsinline autoplay muted loop class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('storage/' . $banner->video) }}" type="video/mp4" />
        </video>
    @elseif($banner && $banner->type === 'image' && $banner->images->count())
        <div class="absolute top-0 left-0 w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $banner->images->first()->image) }}');"></div>
    @endif
    
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-60 z-10"></div>

    <div class="relative container mx-auto px-6 h-full flex flex-col justify-center items-center text-center z-20">
        <span class="text-golden font-display text-2xl mb-4" data-animate="fade-up">{{ $banner->sub_heading ?? 'Your Next' }}</span>
        <h1 class="font-display text-5xl md:text-7xl font-bold leading-tight mb-6" data-animate="fade-up" data-animate-delay="150">
            {{ $banner->heading ?? 'Prestigious Address' }}
        </h1>
        <p class="max-w-3xl text-lg text-gray-200 mb-8 font-elegant" data-animate="fade-up" data-animate-delay="300">
            {!! $banner->description !!}
        </p>
        <div class="w-full max-w-4xl backdrop-blur-md " data-animate="fade-up" data-animate-delay="450">
            <form action="{{ route('search.properties') }}" method="GET" class=" p-4 bg-slate-400/10 rounded-lg shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <select name="city" class="md:col-span-2 w-full bg-white/10 text-white border-gray-600 rounded-md px-4 py-3 focus:ring-golden focus:border-golden font-modern">
                        <option value="" class="text-black">Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->city_name }}" class="text-black">{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="developer" placeholder="Type Developer name..." class="md:col-span-2 w-full bg-white/10 text-white border-gray-600 rounded-md px-4 py-3 placeholder-gray-300 focus:ring-golden focus:border-golden font-modern" />
                    <button type="submit" class="md:col-span-1 w-full bg-golden text-navy font-bold px-6 py-3 rounded-md hover:bg-white hover:-translate-y-1 transition-all duration-300 flex items-center justify-center font-display">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        <span>Search</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Esteemed Partners Section -->
<section class="py-20 bg-gray-50" data-animate="fade-up">
    <div class="container mx-auto px-6 text-center">
        <h2 class="font-display text-4xl text-navy mb-4">Our Esteemed Partners</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-12 font-elegant">{!! $global_settings->home_sec1_paragraph !!}</p>
        <div class="swiper client_slider">
            <div class="swiper-wrapper flex items-center">
                @foreach($builders as $builder)
                <div class="swiper-slide text-center px-4">
                    <a href="{{ url('developer/' . $builder->slug) }}" class="grayscale hover:grayscale-0 transition duration-300 opacity-60 hover:opacity-100">
                        <img src="{{ url('storage/' . $builder->logo) }}" alt="{{ $builder->name }}" class="h-16 mx-auto" />
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Property Types Section -->
<section class="py-20 lg:px-32 px-2 bg-white" data-animate="fade-up">
    <div class="container mx-auto px-6 text-center">
        @php $headingParts = explode('||', $global_settings->home_sec2_heading); @endphp
        <h2 class="font-display text-4xl text-navy mb-4">
            {{ $headingParts[0] ?? '' }} <span class="text-golden">{{ $headingParts[1] ?? '' }}</span>
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-12 font-elegant">{!! $global_settings->home_sec2_paragraph !!}</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            @foreach ($subtypes->take(3) as $subtype)
            <div class="group relative rounded-2xl overflow-hidden transition-transform duration-300" data-animate="fade-up" data-animate-delay="{{ $loop->index * 100 }}">
                <a href="{{ route('property.by.subtype', $subtype->slug) }}" class="block">
                    <div class="relative property-card-overlay overflow-hidden rounded-2xl">
                        <img src="{{ asset('uploads/psubtypes/' . $subtype->main_image) }}" alt="{{ $subtype->psubtype_name }}" class="w-full {{ $loop->iteration == 2 ? 'h-[28rem]' : 'h-96' }} object-cover group-hover:scale-105 transition-transform duration-300" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 p-8 z-20">
                        <h3 class="font-display text-3xl text-white font-bold transition-colors duration-300 group-hover:text-golden">{{ $subtype->psubtype_name }}</h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-24 bg-navy" data-animate="fade-up">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center text-white">
            @foreach($statistics as $statistic)
            <div data-animate="fade-up" data-animate-delay="{{ $loop->index * 100 }}">
                
                    <img src="{{ url('storage/' . $statistic->icon_path) }}" alt="{{ $statistic->label }}" class="h-12 w-12 mx-auto mb-4" />
               
                <p class="text-5xl font-bold text-golden font-display"><span class="count" data-count="{{ $statistic->count }}">{{ $statistic->count }}</span>+</p>
                <p class="text-gray-300 mt-2 font-elegant">{{ $statistic->label }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Properties Section -->
<section class="py-20 bg-white" data-animate="fade-up">
    <div class="container mx-auto px-6">
        @php $headingParts = explode('||', $global_settings->home_sec4_heading); @endphp
        <div class="text-center mb-12">
            <h2 class="font-display text-4xl text-navy mb-4">
                {{ $headingParts[0] ?? '' }} <span class="text-golden">{{ $headingParts[1] ?? '' }}</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto font-elegant">{!! $global_settings->home_sec4_paragraph !!}</p>
        </div>
        <div class="relative">
            <div class="swiper prolisting_slider">
                <div class="swiper-wrapper pb-16">
                    @foreach($homeproperties as $item)
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
                <div class="propdots swiper-pagination"></div>
            </div>
            <!-- Navigation Arrows -->
            <div class="swiper-button-prev pro-prev"></div>
            <div class="swiper-button-next pro-next"></div>
        </div>
    </div>
</section>

<!-- Get in Touch Section -->
<section class="relative py-24 bg-navy-dark text-white" data-animate="fade-up">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('{{ Vite::asset('frontend_assets/images/home/fixedbg.webp') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-navy/70 via-navy/50 to-navy/70"></div>
    <div class="relative container mx-auto px-6 text-center">
        <h2 class="font-display text-3xl lg:text-4xl font-bold mb-4">{{ $global_settings->home_sec5_heading }}</h2>
        <p class="text-gray-300 mb-8 text-base lg:text-lg font-elegant max-w-2xl mx-auto">{!! $global_settings->home_sec5_paragraph !!}</p>
        <a href="{{ route('contact') }}" class="bg-golden text-navy font-bold px-8 py-3 rounded-lg hover:bg-white hover:-translate-y-1 transition-all duration-300 font-display">
            Get In Touch
        </a>
    </div>
</section>

<!-- Properties by Status Section -->
@php $statusLabels = [ 'new-launch' => 'New Launch', 'pre-launch' => 'Pre-Launch', 'under-construction' => 'Under Construction', 'ready-to-move' => 'Ready To Move', 'completed' => 'Completed', 'resale' => 'Resale', 'available' => 'Available', 'sold-out' => 'Sold Out', 'coming-soon' => 'Coming Soon', ]; @endphp
<section class="py-20 bg-gradient-to-br from-gray-50 to-white" data-animate="fade-up">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            @php $headingParts = explode('||', $global_settings->home_sec6_heading); @endphp
            <h2 class="font-display text-4xl md:text-5xl text-navy mb-4">
                {{ $headingParts[0] ?? '' }} <span class="text-golden">{{ $headingParts[1] ?? '' }}</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto font-elegant text-lg">{!! $global_settings->home_sec6_paragraph !!}</p>
        </div>
        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-full p-1 shadow-lg flex flex-wrap justify-center">
                @foreach($availableStatuses as $status)
                    <button class="tab-item text-sm md:text-base font-medium px-4 md:px-6 py-2 rounded-full transition-all duration-300 {{ $loop->first ? 'active' : '' }} font-display" data-tab="{{ str_replace('-', '_', $status) }}">
                        {{ $statusLabels[$status] ?? ucwords(str_replace('-', ' ', $status)) }}
                    </button>
                @endforeach
            </div>
        </div>
        <div>
            @foreach($availableStatuses as $status)
            <div class="tab-content grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 {{ $loop->first ? 'active' : '' }}" id="{{ str_replace('-', '_', $status) }}">
                @foreach($propertiesByStatus[$status] as $property)
                    <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden group h-full flex flex-col border border-gray-100 hover:border-golden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <!-- Image Container with Enhanced Overlay -->
                        <div class="relative overflow-hidden">
                            <a href="{{ url('property/' . $property->slug) }}" class="block">
                                <img src="{{ asset('storage/' . $property->main_image) }}" class="w-full h-72 object-cover transition-transform duration-700 group-hover:scale-110" alt="{{ $property->heading }}" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
                            </a>
                            
                            <!-- Enhanced Badges -->
                            <div class="absolute top-4 left-4 flex flex-col gap-2">
                                @if($loop->first)
                                    <span class="bg-gradient-to-r from-golden to-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        Featured
                                    </span>
                                @endif
                                @if($status === 'ready-to-move')
                                    <span class="bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Ready To Move
                                    </span>
                                @endif
                                @if($status === 'new-launch')
                                    <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/>
                                        </svg>
                                        New Launch
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Price Tag -->
                            <div class="absolute bottom-4 left-4">
                                <div class="bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2 shadow-lg">
                                    <p class="text-navy font-bold text-sm">{{ $property->price }}</p>
                                </div>
                            </div>
                            
                          
                        </div>
                        
                        <!-- Enhanced Content Section -->
                        <div class="p-6 flex flex-col flex-grow">
                            <!-- Property Title with Hover Effect -->
                            <h3 class="font-display text-xl text-navy font-bold mb-2 line-clamp-2 hover:text-golden transition-colors duration-300">
                                <a href="{{ url('property/' . $property->slug) }}" class="hover:text-golden transition-colors">{{ $property->heading }}</a>
                            </h3>
                            
                            <!-- Developer with Logo -->
                            <div class="flex items-center mb-4">
                                <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center mr-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-5L9 2H4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 text-sm font-medium">By {{ optional($property->builder)->name ?? 'N/A' }}</p>
                            </div>
                            
                            <!-- Enhanced Property Details -->
                            <div class="space-y-3 text-gray-700">
                                <div class="flex items-center text-sm">
                                    <div class="w-5 h-5 bg-golden/10 rounded-full flex items-center justify-center mr-2">
                                        <svg class="w-3 h-3 text-golden" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">{{ $property->location }}</span>
                                </div>
                                
                                <div class="flex items-center text-sm">
                                    <div class="w-5 h-5 bg-golden/10 rounded-full flex items-center justify-center mr-2">
                                        <svg class="w-3 h-3 text-golden" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a2 2 0 00-2 2v6a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-1a1 1 0 100-2h1a4 4 0 014 4v6a4 4 0 01-4 4H6a4 4 0 01-4-4V7a4 4 0 014-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">{{ $property->configuration }}</span>
                                </div>
                                
                                <div class="flex items-center text-sm">
                                    <div class="w-5 h-5 bg-golden/10 rounded-full flex items-center justify-center mr-2">
                                        <svg class="w-3 h-3 text-golden" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                                            <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                                        </svg>
                                    </div>
                                    <span class="text-gray-700">{{ $property->area ?? 'N/A' }} sq ft</span>
                                </div>
                            </div>
                            
                            <!-- Enhanced CTA Button -->
                            <div class="mt-auto pt-4">
                                <a href="{{ url('property/' . $property->slug) }}" class="inline-flex items-center justify-center w-full bg-gradient-to-r from-navy to-navy/90 text-white hover:from-golden hover:to-yellow-500 px-6 py-3 rounded-xl font-medium text-sm hover:-translate-y-0.5 transition-all duration-300 group/button shadow-md hover:shadow-lg">
                                    <span>View Details</span>
                                    <svg class="w-4 h-4 ml-2 transform transition-transform duration-300 group-hover/button:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Global Presence Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 to-white overflow-hidden" data-animate="fade-up">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            @php $headingParts = explode('||', $global_settings->home_sec7_heading); @endphp
            <h2 class="font-display text-5xl text-navy mb-6 font-bold">
                {{ $headingParts[0] ?? '' }} <span class="text-golden">{{ $headingParts[1] ?? '' }}</span>
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg font-elegant leading-relaxed">{!! $global_settings->home_sec7_paragraph !!}</p>
        </div>
        
        <!-- Two Row Design with Opposite Scrolling -->
        <div class="relative">
            @php 
                $citiesArray = $cities->take(6)->toArray();
                $firstRow = array_slice($citiesArray, 0, 3);
                $secondRow = array_slice($citiesArray, 3, 3);
            @endphp
            
            <!-- First Row - Moves Right to Left -->
            <div class="mb-8 overflow-hidden">
                <div class="pt-10 flex space-x-6 animate-scroll-left" style="width: max-content;">
                    @foreach ($firstRow as $city)
                    <div class="group relative bg-white rounded-2xl overflow-x-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex-shrink-0" style="width: 380px;">
                        <!-- Image Container with Gradient Overlay -->
                        <div class="relative overflow-hidden">
                            <img src="{{ url('storage/' . $city['main_image']) }}" alt="{{ $city['city_name'] }}" 
                                 class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            
                            <!-- City Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="bg-golden text-navy px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                    {{ strtoupper($city['city_name']) }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Hover Effect Border -->
                        <div class="absolute inset-0 border-2 border-transparent group-hover:border-golden rounded-2xl transition-all duration-300 pointer-events-none"></div>
                    </div>
                    @endforeach
                    
                    <!-- Duplicate cards for seamless loop -->
                    @foreach ($firstRow as $city)
                   <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex-shrink-0" style="width: 380px;">
                        <!-- Image Container with Gradient Overlay -->
                        <div class="relative overflow-hidden">
                            <img src="{{ url('storage/' . $city['main_image']) }}" alt="{{ $city['city_name'] }}" 
                                 class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            
                            <!-- City Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="bg-golden text-navy px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                    {{ strtoupper($city['city_name']) }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Hover Effect Border -->
                        <div class="absolute inset-0 border-2 border-transparent group-hover:border-golden rounded-2xl transition-all duration-300 pointer-events-none"></div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Second Row - Moves Left to Right -->
            <div class="overflow-hidden">
                <div class="pt-5 flex space-x-6 animate-scroll-right" style="width: max-content;">
                    @foreach ($secondRow as $city)
                    <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex-shrink-0" style="width: 380px;">
                        <!-- Image Container with Gradient Overlay -->
                        <div class="relative overflow-hidden">
                            <img src="{{ url('storage/' . $city['main_image']) }}" alt="{{ $city['city_name'] }}" 
                                 class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            
                            <!-- City Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="bg-golden text-navy px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                    {{ strtoupper($city['city_name']) }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Hover Effect Border -->
                        <div class="absolute inset-0 border-2 border-transparent group-hover:border-golden rounded-2xl transition-all duration-300 pointer-events-none"></div>
                    </div>
                    @endforeach
                    
                    <!-- Duplicate cards for seamless loop -->
                    @foreach ($secondRow as $city)
                    <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex-shrink-0" style="width: 380px;">
                        <!-- Image Container with Gradient Overlay -->
                        <div class="relative overflow-hidden">
                            <img src="{{ url('storage/' . $city['main_image']) }}" alt="{{ $city['city_name'] }}" 
                                 class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            
                            <!-- City Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="bg-golden text-navy px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                    {{ strtoupper($city['city_name']) }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Hover Effect Border -->
                        <div class="absolute inset-0 border-2 border-transparent group-hover:border-golden rounded-2xl transition-all duration-300 pointer-events-none"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- View All Cities CTA -->
        <div class="text-center mt-12">
            <a href="{{ url('/locations') }}" 
               class="inline-flex items-center bg-gradient-to-r from-golden to-yellow-500 text-navy px-8 py-4 rounded-full font-bold text-lg hover:from-navy hover:to-navy/90 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <span>View All Cities</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<x-testimonial-section :global_settings="$global_settings" :testimonials="$testimonials" />

<!-- Blogs Section -->
<section class="py-24 bg-gray-50" data-animate="fade-up">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        @php $headingParts = explode('||', $global_settings->home_sec9_heading); @endphp
        <div class="text-center mb-16">
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl text-navy mb-6 font-bold leading-tight">
                {{ $headingParts[0] ?? '' }} <span class="text-golden">{{ $headingParts[1] ?? '' }}</span>
            </h2>
            <p class="text-gray-600 text-base sm:text-lg max-w-3xl mx-auto leading-relaxed font-elegant">{!! $global_settings->home_sec9_paragraph !!}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @if($blogs->count() > 0)
                @php $featuredBlog = $blogs->first(); @endphp
                <!-- Featured Blog Post -->
                <div class="lg:col-span-2 group relative bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl" data-animate="fade-up">
                    <a href="{{ url('blog/' . $featuredBlog->slug) }}" class="block">
                        <img src="{{ asset('storage/' . $featuredBlog->main_image) }}" alt="{{ $featuredBlog->heading }}" class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-8 text-white">
                            <p class="text-sm mb-2">{{ $featuredBlog->created_at->format('d M, Y') }}</p>
                            <h3 class="font-display text-3xl font-bold line-clamp-2">{{ $featuredBlog->heading }}</h3>
                        </div>
                    </a>
                </div>
                <!-- Other Blog Posts -->
                <div class="space-y-8">
                    @foreach($blogs->skip(1)->take(2) as $blog)
                    <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-500 transform hover:-translate-y-2 hover:shadow-2xl" data-animate="fade-up" data-animate-delay="{{ $loop->index * 150 }}">
                        <a href="{{ url('blog/' . $blog->slug) }}" class="block">
                            <img src="{{ asset('storage/' . $blog->main_image) }}" alt="{{ $blog->heading }}" class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-105" />
                             <div class="p-6">
                                <p class="text-xs text-gray-500 mb-2">{{ $blog->created_at->format('d M, Y') }}</p>
                                <h3 class="font-display text-lg text-navy font-bold line-clamp-2 group-hover:text-golden transition-colors">{{ $blog->heading }}</h3>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="text-center mt-16">
            <a href="{{ url('/blogs') }}" class="inline-flex items-center bg-gradient-to-r from-navy to-navy/90 text-white px-8 py-4 rounded-full font-bold text-lg hover:from-golden hover:to-yellow-500 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <span>View All Articles</span>
                 <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection



@push('scripts')
<script>
    // This function initializes the sliders
    function initializeSwipers() {
        const client_slider = new Swiper('.client_slider', {
            loop: true,
            slidesPerView: 2,
            spaceBetween: 20,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: { slidesPerView: 3, spaceBetween: 20 },
                768: { slidesPerView: 4, spaceBetween: 40 },
                1024: { slidesPerView: 5, spaceBetween: 50 },
            },
        });

        const prolisting_slider = new Swiper('.prolisting_slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.propdots',
                clickable: true,
            },
            navigation: {
                nextEl: '.pro-next',
                prevEl: '.pro-prev',
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });

        
        
        const global_slider = new Swiper('.global_slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                1024: { slidesPerView: 4 },
            },
        });
    }

    // This function waits until the Swiper library is loaded before initializing the sliders
    function waitForSwiper() {
        if (typeof Swiper !== 'undefined') {
            // If Swiper is loaded, initialize it
            initializeSwipers();
        } else {
            // If not, wait 100ms and check again
            setTimeout(waitForSwiper, 100);
        }
    }

    // Start the process
    waitForSwiper();

    // Animation on scroll script
    document.addEventListener('DOMContentLoaded', () => {
        const animatedElements = document.querySelectorAll('[data-animate]');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.animateDelay || 0;
                    setTimeout(() => {
                        entry.target.classList.add('is-visible');
                    }, delay);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        animatedElements.forEach(element => {
            observer.observe(element);
        });

        // Tab functionality
        const tabs = document.querySelectorAll('.tab-item');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document.getElementById(tab.dataset.tab);

                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                tabContents.forEach(c => c.classList.remove('active'));
                target.classList.add('active');
            });
        });
    });
</script>
@endpush
