@extends('layouts.master') 
@section('title','Developers | Luxury Homez') 
@section('description','Explore our trusted network of elite developers, each committed to delivering unparalleled quality and luxury in every project.') 

@section('content')

@push('styles')
@vite([
    'frontend_assets/sass/home/home.css',
    'frontend_assets/css/developers.css',
    'frontend_assets/css/hoztab.css',
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/aresponsive.css'
])
{{-- Alpine.js is used for the interactive filter --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
            {{-- Fallback background if no banner is set --}}
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059ee41F?q=80&w=2147');"></div>
        @endif
        <!-- Darkening overlay -->
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6" data-animate="fade-up">
        <p class="font-display text-gold-accent font-semibold tracking-widest uppercase mb-4">{{ $banner->sub_heading ?? 'Our Partners' }}</p>
        <h1 class="font-display text-5xl md:text-7xl font-bold mb-6 leading-tight">
            {{ $banner->heading ?? 'Esteemed Developers' }}
        </h1>
        <div class="max-w-3xl mx-auto text-base text-gray-300 font-elegant">
            {!! $banner->description !!}
        </div>
    </div>
</div>
<!-- =================================================================================== -->
<!-- END: HERO BANNER SECTION                                                          -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: DEVELOPERS GRID SECTION (REDESIGNED)                                       -->
<!-- =================================================================================== -->
<section class="bg-gray-50 py-20 sm:py-28">
    <div class="container mx-auto px-6" x-data="{ activeCity: 'all' }">
        <div class="max-w-7xl mx-auto">
            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-3 mb-12" data-animate="fade-up">
                <button @click="activeCity = 'all'" 
                        :class="activeCity === 'all' ? 'bg-golden text-navy-dark' : 'bg-white text-gray-600 hover:bg-golden/20 hover:text-navy-dark'"
                        class="px-6 py-3 font-display text-sm font-bold rounded-full shadow-sm transition-colors duration-300">
                    All Developers
                </button>
                @foreach($cities as $city)
                <button @click="activeCity = '{{ Str::slug($city->city_name) }}'"
                        :class="activeCity === '{{ Str::slug($city->city_name) }}' ? 'bg-golden text-navy-dark' : 'bg-white text-gray-600 hover:bg-golden/20 hover:text-navy-dark'"
                        class="px-6 py-3 font-display text-sm font-bold rounded-full shadow-sm transition-colors duration-300">
                    {{ $city->city_name }}
                </button>
                @endforeach
            </div>

            <!-- Developers Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                @foreach($builders->flatten() as $builder)
                <div x-show="activeCity === 'all' || activeCity === '{{ Str::slug(optional($builder->cities->first())->city_name) }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     class="text-center"
                     data-animate="fade-up">
                    <a href="{{ url('developer/' . $builder->slug) }}" class="group block bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <img src="{{ asset('storage/' . $builder->logo) }}" alt="{{ $builder->name }}" class="h-20 mx-auto grayscale group-hover:grayscale-0 transition-all duration-300" />
                        <p class="font-elegant text-navy-dark mt-4 text-sm">{{ $builder->name }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: DEVELOPERS GRID SECTION                                                      -->
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
