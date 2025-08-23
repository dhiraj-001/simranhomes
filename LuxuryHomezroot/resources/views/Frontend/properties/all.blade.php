@extends('layouts.master') 
@section('title','Properties | Simran Home Solution') 
@section('description','Browse our exclusive collection of luxury properties in premier locations.') 

@section('content') 

@push('styles')
@vite([
    'frontend_assets/css/developers.css',
    'frontend_assets/css/hoztab.css',
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/aresponsive.css'
])
{{-- Alpine.js is used for the interactive filter drawer --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
.pagination nav {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
}
.pagination .page-item .page-link {
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    color: #0A2342; /* navy-dark */
}
.pagination .page-item.active .page-link {
    background-color: #0A2342; /* navy-dark */
    color: white;
    border-color: #0A2342;
}
.pagination .page-item:not(.disabled) .page-link:hover {
    background-color: #f0f0f0;
}
.pagination .page-item.disabled .page-link {
    color: #9ca3af;
}
</style>
@endpush

<!-- =================================================================================== -->
<!-- START: HERO BANNER SECTION (REDESIGNED)                                           -->
<!-- =================================================================================== -->
<div class="relative h-[60vh] min-h-[500px] flex items-center justify-center text-center text-white overflow-hidden">
    <!-- Background Media -->
    <div class="absolute inset-0 z-0 bg-navy-dark">
        @if($banner && $banner->type === 'image' && $banner->images->count())
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $banner->images->first()->image) }}');"></div>
        @else
            {{-- Fallback background --}}
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070');"></div>
        @endif
        <!-- Darkening overlay -->
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6" data-animate="fade-up">
        <h1 class="font-display text-5xl md:text-7xl font-bold mb-6 leading-tight">
            @if(request()->is('city/*') && isset($city))
                Properties in <span class="text-gold-accent">@if(is_object($city)){{ $city->city_name }}@else{{ $city }}@endif</span>
            @elseif(request()->is('search-properties'))
                Search Results
            @else
                All <span class="text-gold-accent">Properties</span>
            @endif
        </h1>
        <div class="max-w-3xl mx-auto text-base text-gray-300 font-elegant">
            @if(request()->is('search-properties'))
                @php
                    $searchCity = request('city');
                    $developer = request('developer');
                @endphp
                <p>
                    Showing results
                    @if($searchCity) for properties in <strong>{{ ucfirst($searchCity) }}</strong> @endif
                    @if($developer) by <strong>{{ strtoupper($developer) }}</strong> @endif
                </p>
            @else
                {!! $banner->description !!}
            @endif
        </div>
    </div>
</div>
<!-- =================================================================================== -->
<!-- END: HERO BANNER SECTION                                                          -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: PROPERTIES & FILTER SECTION (REDESIGNED)                                   -->
<!-- =================================================================================== -->
<section class="bg-gray-50 py-20 sm:py-28" x-data="{ filtersOpen: false }">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header & Filter Trigger -->
            <div class="flex justify-between items-center mb-12" data-animate="fade-up">
                <h2 class="font-display text-3xl md:text-4xl text-navy-dark font-bold">
                    Our Collection
                </h2>
                <button @click="filtersOpen = !filtersOpen" class="flex items-center gap-2 bg-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L16 11.414V17l-4 4v-9.586L3.293 6.707A1 1 0 013 6V4z"></path></svg>
                    <span class="font-display text-navy-dark font-bold">Filters</span>
                </button>
            </div>

            <!-- Filter Drawer -->
            <div x-show="filtersOpen" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="bg-white p-6 rounded-2xl shadow-lg mb-12" style="display: none;">
                <form action="{{ route('search.properties') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                    {{-- Location --}}
                    <div>
                        <label for="city-filter" class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <select id="city-filter" name="city" class="w-full rounded-md border-gray-300 shadow-sm focus:border-gold-accent focus:ring-gold-accent">
                            <option value="">All Cities</option>
                            @foreach ($cities as $city_item)
                                @if(is_object($city_item))
                                    <option value="{{ $city_item->city_name }}">{{ $city_item->city_name }}</option>
                                @else
                                    <option value="{{ $city_item }}">{{ $city_item }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    {{-- Developer --}}
                    <div>
                        <label for="developer-filter" class="block text-sm font-medium text-gray-700 mb-1">Developer</label>
                        <input type="text" id="developer-filter" name="developer" placeholder="e.g. DLF" class="w-full rounded-md border-gray-300 shadow-sm focus:border-gold-accent focus:ring-gold-accent">
                    </div>
                    {{-- Budget --}}
                     <div>
                        <label for="budget-filter" class="block text-sm font-medium text-gray-700 mb-1">Budget</label>
                        <select id="budget-filter" name="budget" class="w-full rounded-md border-gray-300 shadow-sm focus:border-gold-accent focus:ring-gold-accent">
                            <option value="">Any Budget</option>
                            <option value="1">Under ₹5 Cr.</option>
                            <option value="2">₹5 cr to ₹7 Cr.</option>
                            <option value="3">₹7 Cr. to ₹10 Cr.</option>
                            <option value="4">₹10 Cr. to ₹15 Cr.</option>
                            <option value="5">Above ₹15 Cr.</option>
                        </select>
                    </div>
                    {{-- Search Button --}}
                    <button type="submit" class="w-full bg-navy-dark text-white font-bold px-6 py-2.5 rounded-md hover:bg-gold-accent hover:text-navy-dark transition-all duration-300">
                        Apply Filters
                    </button>
                </form>
            </div>

            <!-- Properties Grid -->
            @if($properties->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($properties as $item)
                <div class="bg-white rounded-lg overflow-hidden group h-full flex flex-col border hover:border-transparent hover:border-gold-accent shadow-lg hover:shadow-xl transition-all duration-300" data-animate="fade-up" data-animate-delay="{{ $loop->index * 50 }}">
                    <a href="{{ url('property/' . $item->slug) }}" class="block relative overflow-hidden">
                        <img src="{{ asset('storage/' . $item->main_image) }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" alt="{{$item->heading}}" />
                        <span class="absolute top-4 left-4 bg-navy-dark/80 text-white text-xs font-bold px-3 py-1 rounded-full">{{$item->property_status}}</span>
                    </a>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-display text-xl text-navy-dark font-bold mb-2 truncate">
                            <a href="{{ url('property/' . $item->slug) }}" class="hover:text-gold-accent transition">{{$item->heading}}</a>
                        </h3>
                        <p class="text-gray-500 text-sm mb-4 font-elegant">By {{ optional($item->builder)->name ?? 'N/A' }}</p>
                        <div class="space-y-3 text-gray-700 font-elegant text-sm">
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-gold-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $item->location }}</p>
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-gold-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 4h4m-8 4h8m-7-8a2 2 0 00-2 2v4a2 2 0 002 2h5a2 2 0 002-2v-1a1 1 0 00-1-1H9"></path></svg> Price: {{ $item->price }}</p>
                            <p class="flex items-center"><svg class="w-4 h-4 mr-2 text-gold-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ $item->configuration }}</p>
                        </div>
                        <a href="{{ url('property/' . $item->slug) }}" class="inline-block mt-auto pt-4 font-display text-navy-dark font-bold group/link">
                            View Details <span class="inline-block transition-transform duration-300 group-hover/link:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            {{-- No Properties Found Message --}}
            <div class="text-center py-20 border-2 border-dashed rounded-2xl">
                 <svg class="w-16 h-16 mx-auto text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                 <h4 class="mt-4 font-display text-2xl text-navy-dark">No Properties Found</h4>
                 @if(request()->is('city/*') && isset($city))
                    <p class="mt-2 text-gray-500 font-elegant">We’ll be adding new properties in @if(is_object($city)){{ $city->city_name }}@else{{ $city }}@endif soon. Please check back later.</p>
                 @elseif(request()->is('search-properties'))
                    <p class="mt-2 text-gray-500 font-elegant">Try refining your filters or selecting a different city/developer.</p>
                 @else
                    <p class="mt-2 text-gray-500 font-elegant">Please try a different category or check back soon.</p>
                 @endif
            </div>
            @endif

            <!-- Pagination -->
            <div class="mt-20 pagination">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: PROPERTIES & FILTER SECTION                                                  -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: TESTIMONIALS SECTION                                                       -->
<!-- =================================================================================== -->
<section class="bg-navy py-24 w-full overflow-hidden" data-animate="fade-up">
    <div class="container mx-auto px-4 sm:px-6 max-w-7xl">
        <div class="text-center mb-12">
            @php $headingParts = explode('||', $global_settings->home_sec8_heading); @endphp
            <h2 class="font-display text-4xl text-white mb-4">
                {{ $headingParts[0] ?? '' }} <span class="text-golden">{{ $headingParts[1] ?? '' }}</span>
            </h2>
            <p class="text-gray-300 max-w-2xl mx-auto font-elegant">{!! $global_settings->home_sec8_paragraph !!}</p>
        </div>

        <div class="swiper testimonial_slider w-full relative">
            <div class="swiper-wrapper py-16">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide h-full">
                        <div class="testimonial-card bg-white/10 p-6 sm:p-8 rounded-lg h-full flex flex-col text-center max-w-sm mx-auto shadow-sm shadow-yellow-200 transition-all duration-500 ease-out hover:bg-white/20 hover:shadow-lg hover:shadow-golden/60 hover:-translate-y-2 hover:scale-105 group relative">
                            <div class="relative">
                                <svg class="quote-icon w-10 h-10 text-golden mx-auto mb-4 transition-all duration-500 group-hover:text-yellow-300 group-hover:scale-110" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18"><path d="M6.62 1.833A1 1 0 005.38.65L.21 12.15a1 1 0 00.9 1.28h.21a1 1 0 00.9-1.28L6.62 1.833zM12.62 1.833A1 1 0 0011.38.65L6.21 12.15a1 1 0 00.9 1.28h.21a1 1 0 00.9-1.28l4.31-10.3z"/></svg>
                                <div class="absolute inset-0 bg-gradient-to-br from-golden/0 to-yellow-400/0 rounded-lg opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                            </div>
                            <p class="testimonial-text text-gray-300 italic mb-6 flex-grow font-elegant text-sm sm:text-base transition-all duration-500 group-hover:text-white group-hover:font-medium">"{!! $testimonial->message !!}"</p>
                            <div class="testimonial-author transition-all duration-500">
                                <h3 class="font-display text-lg sm:text-xl text-white font-bold group-hover:text-golden transition-colors duration-500">{{ $testimonial->name }}</h3>
                                <p class="text-golden text-sm font-elegant group-hover:text-yellow-300 transition-colors duration-500">{{ $testimonial->position }}</p>
                                <div class="flex justify-center mt-4 space-x-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="star-icon w-4 h-4 sm:w-5 sm:h-5 {{ $i <= $testimonial->star ? 'text-golden' : 'text-gray-300' }} transition-all duration-500 group-hover:scale-110 group-hover:text-yellow-300" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    @endfor
                                </div>
                            </div>
                            <!-- Hover Border Effect -->
                            <div class="absolute inset-0 border-2 border-transparent rounded-lg group-hover:border-golden/50 transition-all duration-500 pointer-events-none"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Navigation Arrows -->
            <button class="testimonial-button-prev absolute left-72 bottom-0 -translate-y-1/5 z-10 bg-white/10 hover:bg-golden text-white hover:text-navy w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 -ml-5 hidden sm:flex">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button class="testimonial-button-next absolute right-72 bottom-0 -translate-y-1/5 z-10 bg-white/10 hover:bg-golden text-white hover:text-navy w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 -mr-5 hidden sm:flex">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <div class="testimonial-pagination swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: TESTIMONIALS SECTION                                                         -->
<!-- =================================================================================== -->

@push('scripts')
{{-- Main JS for sliders etc. should be handled in your master layout or a dedicated script file --}}
@endpush 
@stop
