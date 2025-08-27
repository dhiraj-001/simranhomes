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
<x-testimonial-section :global_settings="$global_settings" :testimonials="$testimonials" />

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
