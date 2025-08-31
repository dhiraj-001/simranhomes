@extends('layouts.master') 
@section('title','About Us | Luxury Homez') 
@section('description','Discover the ethos of Luxury Homez, where we blend market expertise with a passion for connecting discerning clients with extraordinary properties.') 

@section('content') 

@push('styles')
@vite([
    'frontend_assets/sass/home/home.css',
    'frontend_assets/css/developers.css',
    'frontend_assets/css/hoztab.css',
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/aresponsive.css'
])

<style>
    /* Custom styles for the new design, particularly for sliders and interactive elements */
    .vms-slider .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background-color: #BFA15C; /* gold-accent */
        opacity: 0.4;
        transition: all 0.3s ease;
    }
    .vms-slider .swiper-pagination-bullet-active {
        width: 30px;
        border-radius: 8px;
        opacity: 1;
    }
    /* Style for the large background text */
    .background-text-stroke {
        -webkit-text-stroke: 1px rgba(10, 25, 47, 0.1); /* navy-dark at 10% opacity */
        color: transparent;
        font-weight: 800;
    }
</style>
@endpush

<!-- =================================================================================== -->
<!-- START: HERO BANNER SECTION (REDESIGNED)                                           -->
<!-- =================================================================================== -->
<div class="relative h-screen min-h-[700px] flex items-center justify-center text-center px-5 text-white overflow-hidden">
    <!-- Background Media (Video or Image) with Dark Overlay -->
    <div class="absolute inset-0 z-0 bg-navy-dark">
        @if($banner && $banner->type === 'video' && $banner->video)
            <video playsinline autoplay muted loop class="w-full h-full object-cover">
                <source src="{{ asset('storage/' . $banner->video) }}" type="video/mp4" />
            </video>
        @elseif($banner && $banner->type === 'image' && $banner->images->count())
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $banner->images->first()->image) }}');"></div>
        @endif
        <!-- Darkening overlay for better text readability -->
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6" data-animate="fade-up">
        <p class="font-display text-gold-accent font-semibold tracking-widest uppercase mb-4">{{ $banner->sub_heading }}</p>
        
        <h1 class="font-display text-5xl md:text-7xl font-bold mb-6 leading-tight">
            {{ $banner->heading }}
        </h1>
        
        <div class="max-w-3xl mx-auto text-base text-gray-300 mb-8 font-elegant">
            {!! $banner->description !!}
        </div>
        
        <!-- Search Bar Component (Ensure fonts inside use font-modern) -->
        <div class="max-w-4xl mx-auto">
            <x-search-bar :cities="$cities" />
        </div>
    </div>
</div>
<!-- =================================================================================== -->
<!-- END: HERO BANNER SECTION                                                          -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: ABOUT US SECTION (REDESIGNED)                                              -->
<!-- =================================================================================== -->
<section class="bg-cream py-20 sm:py-28 overflow-hidden relative px-5" id="about-us">
    <!-- Large decorative background text -->
    <div class="absolute top-1/2 -translate-y-1/2 left-0 w-full text-center select-none z-0">
        <h2 class="background-text-stroke text-[15vw] leading-none font-display">Luxury Homez</h2>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
                <!-- Content Column -->
                <div class="lg:col-span-3" data-animate="fade-right">
                    <p class="font-display text-gold-accent font-semibold tracking-widest uppercase mb-4">
                        {{ $about->subtitle }}
                    </p>
                    @php $headingParts = explode('||', $about->heading); @endphp
                    <h2 class="font-display text-4xl md:text-5xl text-navy-dark font-bold mb-6 leading-tight">
                        {{ $headingParts[0] ?? '' }}
                        @if(isset($headingParts[1]))
                            <span class="text-gold-accent">{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="prose max-w-none text-gray-600 font-elegant text-md">
                        {!! $about->description !!}
                    </div>
                </div>

                <!-- Image & Stats Column -->
                <div class="lg:col-span-2" data-animate="fade-left" data-animate-delay="200">
                    <div class="relative">
                        <img src="{{ isset($about->image) ? asset('storage/' . $about->image) : 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1974' }}" 
                             alt="Luxury Homez Office Interior" 
                             class="w-full object-cover rounded-2xl shadow-2xl relative z-10">
                        <!-- Overlapping stats card -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: ABOUT US SECTION                                                             -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: FOUNDER'S DESK SECTION (REDESIGNED)                                        -->
<!-- =================================================================================== -->
<section class="bg-white py-20 sm:py-32 px-5">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Content Column -->
                <div data-animate="fade-up">
                    @php $parts = explode(' ', $founder->title, 2); @endphp
                    <h3 class="font-display text-4xl md:text-5xl text-navy-dark font-bold">
                        {{ $parts[0] ?? '' }} <span class="text-gold-accent">{{ $parts[1] ?? '' }}</span>
                    </h3>
                    <p class="font-elegant text-base text-gray-500 mt-4 mb-8">{{ $founder->subtitle }}</p>
                    
                    <!-- Large quote for emphasis -->
                    <div class="relative pl-10">
                        <div class="absolute left-0 top-0 text-7xl text-gold-accent/30 font-display -mt-4">“</div>
                        <div class="prose max-w-none text-gray-600 italic font-elegant text-md">
                            {!! $founder->description !!}
                        </div>
                    </div>

                    <div class="mt-8 border-t border-gray-200 pt-6">
                        <h6 class="font-display text-2xl text-navy-dark font-bold">{{ $founder->name }}</h6>
                        <p class="font-elegant text-gold-accent tracking-wider">{{ $founder->designation }}</p>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="flex justify-center" data-animate="fade-up" data-animate-delay="200">
                    <div class="relative rounded-full w-80 h-80 lg:w-96 lg:h-96 shadow-xl p-4 border-4 border-gold-accent/20">
                        <img src="{{ Vite::asset('frontend_assets/images/about/founder.webp') }}" alt="{{ $founder->name }}" class="rounded-full w-full h-full object-cover" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: FOUNDER'S DESK SECTION                                                       -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: VISION, MISSION, STRENGTHS SECTION (REDESIGNED)                            -->
<!-- =================================================================================== -->
<section class="bg-cream py-20 sm:py-28 px-5">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Using a Swiper instance for the slider -->
            <div class="swiper vms-slider">
                <div class="swiper-wrapper">
                    <!-- Vision Slide -->
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <img src="{{ Vite::asset('frontend_assets/images/about/vision.webp') }}" alt="Vision" class="rounded-2xl shadow-lg w-full h-96 object-cover"/>
                            <div>
                                <h4 class="font-display text-4xl text-navy-dark font-bold mb-4">{{ $vms->visionTitle }}</h4>
                                <div class="prose text-gray-600 font-elegant text-md">{!! $vms->visionDescription !!}</div>
                            </div>
                        </div>
                    </div>
                    <!-- Mission Slide -->
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <img src="{{ Vite::asset('frontend_assets/images/about/mission.webp') }}" alt="Mission" class="rounded-2xl shadow-lg w-full h-96 object-cover"/>
                            <div>
                                <h4 class="font-display text-4xl text-navy-dark font-bold mb-4">{{ $vms->missionTitle }}</h4>
                                <div class="prose text-gray-600 font-elegant text-md">{!! $vms->missionDescription !!}</div>
                            </div>
                        </div>
                    </div>
                    <!-- Strengths Slide -->
                    <div class="swiper-slide">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <img src="{{ Vite::asset('frontend_assets/images/about/strength.webp') }}" alt="Strengths" class="rounded-2xl shadow-lg w-full h-96 object-cover"/>
                            <div>
                                <h4 class="font-display text-4xl text-navy-dark font-bold mb-4">{{ $vms->strengthTitle }}</h4>
                                <div class="prose text-gray-600 font-elegant text-md">{!! $vms->strengthDescription !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Custom Pagination -->
                <div class="swiper-pagination mt-12 !relative !bottom-auto"></div>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: VISION, MISSION, STRENGTHS SECTION                                           -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: REASONS TO CHOOSE US SECTION (IMPROVED DESIGN)                             -->
<!-- =================================================================================== -->
<section class="bg-navy-dark text-white relative py-20 sm:py-28 bg-[#081521] px-5">
    <div class="absolute inset-0 bg-cover bg-center opacity-5" style="background-image: url('{{ Vite::asset('frontend_assets/images/about/texture-bg.webp') }}');"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                <h3 class="font-display text-3xl md:text-4xl font-bold tracking-wider">
                    REASONS TO CHOOSE <span class="text-gold-accent">LUXURY HOMEZ</span>
                </h3>
                <p class="text-golden mt-2 font-elegan t">Because Luxury Is a Lifestyle</p>
            </div>

            <!-- Flex container for the reasons -->
            <div class="flex flex-wrap justify-center gap-x-12 gap-y-10 mb-16" data-animate="fade-up" data-animate-delay="200">
                <!-- Item 1: Curated Luxury Listings -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-10 h-10 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 22V12h6v10"></path></svg>
                    </div>
                    <span class="font-modern text-base text-white">Curated Luxury Listings</span>
                </div>
                <!-- Item 2: Local Market Expertise -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-10 h-10 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <span class="font-modern text-base text-white">Local Market Expertise</span>
                </div>
                <!-- Item 3: Transparent & Trustworthy -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-10 h-10 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-1.781-4.121M12 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"></path></svg>
                    </div>
                    <span class="font-modern text-base text-white">Transparent & Trustworthy</span>
                </div>
                <!-- Item 4: Personalized Service -->
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="w-10 h-10 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <span class="font-modern text-base text-white">Personalized Service</span>
                </div>
            </div>

            <div class="max-w-4xl mx-auto text-center text-gray-300 prose font-elegant" data-animate="fade-up" data-animate-delay="400">
                <p>
                    At Luxury Homez, we understand that luxury is not just a price tag—it’s an experience. We go beyond listings to offer white-glove service, in-depth insights, and unmatched professionalism. As we continue to grow and adapt in an ever-evolving market, our core mission remains the same—to connect you with exceptional residences that match your aspirations.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: REASONS TO CHOOSE US SECTION                                                 -->
<!-- =================================================================================== -->

<!-- =================================================================================== -->
<!-- START: AWARDS & ACCOMPLISHMENTS SECTION                                           -->
<!-- =================================================================================== -->
<section class="bg-white py-20 sm:py-28 px-5">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-animate="fade-up">
                <h3 class="font-display text-4xl md:text-5xl text-navy-dark font-bold">
                    Our <span class="text-gold-accent">Accomplishments</span>
                </h3>
                <p class="text-gray-600 max-w-3xl mx-auto mt-4 text-base font-elegant">
                    We have achieved remarkable success with record-breaking sales in the real estate market, showcasing our ability to deliver tangible results. Our dedication to customer satisfaction is unmistakable, evident in the numerous positive reviews and testimonials from our satisfied clients. Furthermore, our unwavering commitment to developers and partners is underscored by the trophies and recognitions proudly displayed in our closets.
                </p>
            </div>

            <!-- Awards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8" data-animate="fade-up" data-animate-delay="200">
                <!-- Award 1 -->
                <div class="bg-cream rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ Vite::asset('frontend_assets/images/awards/award-1.png') }}" alt="Award 1" class="w-full h-auto object-contain rounded-lg">
                </div>

                <!-- Award 2 -->
                <div class="bg-cream rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ Vite::asset('frontend_assets/images/awards/award-2.png') }}" alt="Award 2" class="w-full h-auto object-contain rounded-lg">
                </div>

                <!-- Award 3 -->
                <div class="bg-cream rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ Vite::asset('frontend_assets/images/awards/award-3.png') }}" alt="Award 3" class="w-full h-auto object-contain rounded-lg">
                </div>

                <!-- Award 4 -->
                <div class="bg-cream rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ Vite::asset('frontend_assets/images/awards/award-4.png') }}" alt="Award 4" class="w-full h-auto object-contain rounded-lg">
                </div>
            </div>

        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: AWARDS & ACCOMPLISHMENTS SECTION                                             -->
<!-- =================================================================================== -->

<!-- =================================================================================== -->
<!-- START: DEVELOPERS/PARTNERS SECTION (REDESIGNED)                                   -->
<!-- =================================================================================== -->
<section class="bg-cream py-20 sm:py-28 px-5">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                @php $headingParts = explode('||', $global_settings->home_sec1_heading); @endphp
                <h2 class="font-display text-4xl md:text-5xl text-navy-dark font-bold">
                    {{ $headingParts[0] ?? '' }}
                    @if(isset($headingParts[1]))
                        <span class="text-gold-accent">{{ $headingParts[1] }}</span>
                    @endif
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4 text-base font-elegant">{!! $global_settings->home_sec1_paragraph !!}</p>
            </div>
            
            <!-- Client Logo Slider -->
            <div class="swiper client_slider">
                <div class="swiper-wrapper items-center">
                    @foreach($builders as $builder)
                     <a class="swiper-slide text-center" href="{{ url('developer/' . $builder->slug) }}">
                        <img src="{{ url('storage/' . $builder->logo) }}" alt="{{ $builder->name }}" class="h-16 mx-auto grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-300" />
                    </a>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: DEVELOPERS/PARTNERS SECTION                                                  -->
<!-- =================================================================================== -->

@push('scripts')
 @vite(['frontend_assets/js/about.js'])

 {{-- FIX: Added inline script to initialize the VMS slider --}}
 <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize VMS Slider
        if (document.querySelector('.vms-slider')) {
            new Swiper('.vms-slider', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        }

        // Initialize Client Slider
        if (document.querySelector('.client_slider')) {
            new Swiper('.client_slider', {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                slidesPerView: 2,
                spaceBetween: 20,
                breakpoints: {
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 50,
                    },
                },
            });
        }
    });
 </script>
@endpush 

@stop
