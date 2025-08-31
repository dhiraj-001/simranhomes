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
/* You may need to add these color classes if they don't exist in your global CSS */
.text-navy { color: #0A2342; } /* Example color */
.bg-navy { background-color: #0A2342; } /* Example color */
.text-golden { color: #D4AF37; } /* Example color */
.bg-golden { background-color: #D4AF37; } /* Example color */
.hover\:border-golden:hover { border-color: #D4AF37; } /* Example color */
.hover\:bg-golden:hover { background-color: #D4AF37; } /* Example color */
</style>
@endpush

<div class="relative h-[60vh] min-h-[500px] flex items-center justify-center text-center text-white overflow-hidden">
    <div class="absolute inset-0 z-0 bg-navy-dark">
        @if($banner && $banner->type === 'image' && $banner->images->count())
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $banner->images->first()->image) }}');"></div>
        @else
            {{-- Fallback background --}}
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070');"></div>
        @endif
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6" data-animate="fade-up">
        <h1 class="font-display text-5xl md:text-7xl font-bold mb-6 leading-tight">
            @if(request()->is('city/*') && isset($city))
                Properties in <span class="text-gold-accent">@if(is_object($city)){{ $city->city_name }}@else{{ $city }}@endif</span>
            @elseif(request()->is('search-properties'))
                Search Results
            @elseif(isset($propertyType))
                {{ ucfirst($propertyType) }} <span class="text-gold-accent">Properties</span>
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
<section class="bg-gray-50 py-20 sm:py-28" x-data="{ filtersOpen: false }">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-12" data-animate="fade-up">
                <h2 class="font-display text-3xl md:text-4xl text-navy-dark font-bold">
                    Our Collection
                </h2>
                <button @click="filtersOpen = !filtersOpen" class="flex items-center gap-2 bg-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L16 11.414V17l-4 4v-9.586L3.293 6.707A1 1 0 013 6V4z"></path></svg>
                    <span class="font-display text-navy-dark font-bold">Filters</span>
                </button>
            </div>

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
                    <button type="submit" class="w-full bg-navy text-white font-bold px-6 py-2.5 rounded-md hover:bg-gold-accent hover:text-navy-dark transition-all duration-300">
                        Apply Filters
                    </button>
                </form>
            </div>

            @if($properties->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($properties as $item)
                {{-- NEW CARD DESIGN STARTS HERE --}}
                <div class="bg-white rounded-lg overflow-hidden group h-full flex flex-col border hover:border-golden shadow-lg hover:shadow-xl transition-all duration-300" data-animate="fade-up" data-animate-delay="{{ $loop->index * 50 }}">
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
                        <div class="mt-auto pt-4"> {{-- Added wrapper to push button to the bottom --}}
                            <a href="{{ url('property/' . $item->slug) }}" class="inline-block mt-5 bg-navy text-white hover:bg-golden px-6 py-2 rounded-md font-display transition-colors duration-300">
                                Explore Project
                            </a>
                        </div>
                    </div>
                </div>
                {{-- NEW CARD DESIGN ENDS HERE --}}
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
                 @elseif(isset($propertyType))
                    <p class="mt-2 text-gray-500 font-elegant">We’ll be adding new {{ $propertyType }} properties soon. Please check back later.</p>
                 @else
                    <p class="mt-2 text-gray-500 font-elegant">Please try a different category or check back soon.</p>
                 @endif
            </div>
            @endif

            <div class="mt-20 pagination">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</section>
   <x-testimonial-section :global_settings="$global_settings" :testimonials="$testimonials"/>

@push('scripts')
{{-- Main JS for sliders etc. should be handled in your master layout or a dedicated script file --}}
@endpush
@stop