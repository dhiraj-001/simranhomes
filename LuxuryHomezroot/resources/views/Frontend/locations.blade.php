@extends('layouts.master') 
@section('title','Locations | Luxury Homez') 
@section('description','Discover our presence in premier locations, offering curated luxury properties in the most sought-after cities.') 

@section('content')

@push('styles')
@vite([
    'frontend_assets/sass/home/home.css',
    'frontend_assets/css/developers.css',
    'frontend_assets/css/hoztab.css',
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/aresponsive.css'
])
@endpush

<div class="relative h-[60vh] min-h-[500px] flex items-center justify-center text-center text-white overflow-hidden">
    <div class="absolute inset-0 z-0 bg-navy-dark">
        @if($banner && $banner->type === 'image' && $banner->images->count())
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $banner->images->first()->image) }}');"></div>
        @else
            {{-- Fallback background --}}
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1503174971373-b1f69850b8e1?q=80&w=2070');"></div>
        @endif
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <div class="relative z-10 container mx-auto px-6" data-animate="fade-up">
        <p class="font-display text-gold-accent font-semibold tracking-widest uppercase mb-4">{{ $banner->sub_heading ?? 'Our Presence' }}</p>
        <h1 class="font-display text-5xl md:text-7xl font-bold mb-6 leading-tight">
            {{ $banner->heading ?? 'Prime Locations' }}
        </h1>
        <div class="max-w-3xl mx-auto text-base text-gray-300 font-elegant">
            {!! $banner->description !!}
        </div>
    </div>
</div>
<section class="bg-gray-50 py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                @php $headingParts = explode('||', $global_settings->locationPFSheading); @endphp
                <h2 class="font-display text-4xl md:text-5xl text-navy-dark font-bold">
                    {{ $headingParts[0] ?? '' }}
                    @if(isset($headingParts[1]))
                        <span class="text-gold-accent">{{ $headingParts[1] }}</span>
                    @endif
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4 text-base font-elegant">{!! $global_settings->locationPFSsubparagraph !!}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($cities as $city)
                    <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 w-full" data-animate="fade-up" data-animate-delay="{{ $loop->index * 100 }}">
                        <div class="relative overflow-hidden">
                            <img src="{{ url('storage/' . $city->main_image) }}" alt="{{ $city->city_name }}" 
                                 class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            
                            <div class="absolute top-4 left-4">
                                <span class="bg-golden text-navy px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                    {{ strtoupper($city->city_name) }}
                                </span>
                            </div>
                            
                            <div class="absolute top-4 right-4">
                                <div class="bg-white/90 backdrop-blur-sm rounded-full px-3 py-1 shadow-lg">
                                    <span class="text-navy font-bold text-xs">{{ $city->properties_count ?? '50+' }} Properties</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-navy to-navy/80 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-display text-xl text-navy font-bold">{{ $city->city_name }}</h3>
                                    <p class="text-gray-500 text-xs">Premium Real Estate</p>
                                </div>
                            </div>
                            
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-xs">
                                    <div class="w-1.5 h-1.5 bg-golden rounded-full mr-2"></div>
                                    <span class="text-gray-700">Luxury Apartments & Villas</span>
                                </div>
                                <div class="flex items-center text-xs">
                                    <div class="w-1.5 h-1.5 bg-golden rounded-full mr-2"></div>
                                    <span class="text-gray-700">Prime Locations</span>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-2 mb-4 text-center">
                                <div>
                                    <p class="font-display text-lg font-bold text-navy">{{ $city->luxury_count ?? '25' }}</p>
                                    <p class="text-xs text-gray-500">Luxury</p>
                                </div>
                                <div>
                                    <p class="font-display text-lg font-bold text-navy">{{ $city->premium_count ?? '30' }}</p>
                                    <p class="text-xs text-gray-500">Premium</p>
                                </div>
                                <div>
                                    <p class="font-display text-lg font-bold text-navy">{{ $city->affordable_count ?? '15' }}</p>
                                    <p class="text-xs text-gray-500">Affordable</p>
                                </div>
                            </div>
                            
                            <a href="{{ route('city.properties', $city->slug) }}" 
                               class="group/button w-full inline-flex items-center justify-center bg-gradient-to-r from-navy to-navy/90 text-white px-4 py-2 rounded-lg font-medium hover:from-golden hover:to-yellow-500 transition-all duration-300 shadow-md hover:shadow-lg text-sm">
                                <span>Explore {{ $city->city_name }}</span>
                                <svg class="w-4 h-4 ml-2 transform transition-transform duration-300 group-hover/button:translate-x-1" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                        
                        <div class="absolute inset-0 border-2 border-transparent group-hover:border-golden rounded-2xl transition-all duration-300 pointer-events-none"></div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-20 border-t pt-12" data-animate="fade-up">
                 <div class="prose max-w-3xl mx-auto text-gray-600 font-elegant text-sm">
                    {!! $global_settings->locationPFSparagraph !!}
                 </div>
                 <div class="mt-8">
                    <a href="#" class="inline-block bg-golden text-navy-dark font-bold px-8 py-3 rounded-lg hover:bg-navy-dark hover:text-white hover:-translate-y-1 transition-all duration-300 font-display" data-model=".enquire-pop">
                        Enquire Now
                    </a>
                 </div>
            </div>
        </div>
    </div>
</section>
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
@push('scripts')
<script>
    function initializeTestimonialSlider() {
        const testimonial_slider = new Swiper('.testimonial_slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.testimonial-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.testimonial-button-next',
                prevEl: '.testimonial-button-prev',
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    }

    function waitForSwiper() {
        if (typeof Swiper !== 'undefined') {
            initializeTestimonialSlider();
        } else {
            setTimeout(waitForSwiper, 100);
        }
    }

    waitForSwiper();
</script>
@endpush 
@stop