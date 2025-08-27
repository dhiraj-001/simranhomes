@extends('layouts.master') 
@section('title', $property-> heading) 
@section('keywords', $property-> meta_keywords) 
@section('description',$property-> meta_description) 

@section('content') 

@push('styles')
{{-- Using your original import style --}}
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/allprojects.css">
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/property.css">
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/fancybox.css">
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/aresponsive.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.css"/>
{{-- Alpine.js is used for interactive elements like tabs and accordions --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
    /* Custom styles for the new design */
    .prose h5, .prose h6 {
        scroll-margin-top: 100px; /* Offset for sticky header when jumping to anchors */
    }
    .sticky-sidebar {
        top: 120px; /* Adjust based on your header's height */
    }
    .fancybox__slide {
        padding: 8px;
    }
</style>
@endpush

<!-- =================================================================================== -->
<!-- START: HERO SECTION (REDESIGNED)                                                  -->
<!-- =================================================================================== -->
<section class="relative h-[80vh] min-h-[600px] bg-navy-dark text-white">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('storage/' . $property->banner_image) }}" alt="{{ $property->heading }}" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6 h-full flex flex-col justify-end pb-20">
        <div class="max-w-4xl">
            <h1 class="font-display text-5xl md:text-7xl font-bold leading-tight">{{ $property->heading }}</h1>
            <p class="font-elegant text-xl text-gray-300 mt-2">{{ $property->location }}</p>
            
            <!-- Key Specs -->
            <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-6 border-t border-white/20 pt-6">
                <div>
                    <span class=" text-gray-300 text-lg font-elegant">Starting Price</span>
                    <p class="font-display text-2xl font-bold">{{ $property->price }}</p>
                </div>
                <div>
                    <span class=" text-gray-300 text-lg font-elegant">Status</span>
                    <p class="font-display text-2xl font-bold">{{ $property->property_status }}</p>
                </div>
                <div>
                    <span class=" text-gray-300 text-lg font-elegant">Configuration</span>
                    <p class="font-display text-2xl font-bold">{{ $property->configuration }}</p>
                </div>
                <div>
                    <span class=" text-gray-300 text-lg font-elegant">Unit Size</span>
                    <p class="font-display text-2xl font-bold">{{ $property->unit_size }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: HERO SECTION                                                                 -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: MAIN CONTENT SECTION (REDESIGNED)                                          -->
<!-- =================================================================================== -->
<section class="bg-white py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

            <!-- Main Content (Left Column) -->
            <div class="lg:col-span-8">
                <!-- About Section -->
                <div class="mb-16" id="about-us" data-animate="fade-up">
                    <h2 class="font-display text-4xl text-navy-dark font-bold mb-6">{{ $property->about_heading }}</h2>
                    <div class="prose max-w-none font-elegant text-gray-700">
                        {!! $property->about_content !!}
                    </div>
                </div>

                <!-- Highlights Section -->
               

                <!-- Amenities Section -->
                <div class="mb-16" id="amenities" data-animate="fade-up">
                    <h2 class="font-display text-4xl text-navy-dark font-bold mb-6">{{ $property-> heading }} <span>Amenities</span></h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                        @foreach($property->amenities as $item)
                        <div class="text-center bg-gray-50 p-4 rounded-lg border hover:border-gold-accent transition-colors">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="h-12 w-12 mx-auto" />
                            <p class="font-elegant text-sm text-navy-dark mt-2">{{ $item->title }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pricing Section -->
                <div class="mb-16" id="price" data-animate="fade-up">
                    <h2 class="font-display text-4xl text-navy-dark font-bold mb-6">{{ $property-> heading }} <span>Price List</span></h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($property->prices as $price)
                        <div class="border rounded-2xl p-6 flex justify-between items-center">
                            <div>
                                <p class="font-display text-lg font-bold text-navy-dark">{{ $price->unit_type }}</p>
                                <p class="font-elegant text-sm text-gray-500">{{ $price->unit_size }}</p>
                            </div>
                            <p class="font-display text-xl font-bold text-gold-accent">{{ $price->price }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Floor Plans Section -->
                @if ($property->floorPlans->count())
                <div class="mb-16" id="floor-plans" x-data="{ activeTab: 'tab0' }" data-animate="fade-up">
                    <h2 class="font-display text-4xl text-navy-dark font-bold mb-6">Floor Plans</h2>
                    <div class="flex border-b mb-6">
                        @foreach ($property->floorPlans as $index => $plan)
                        <button @click="activeTab = 'tab{{ $index }}'" 
                                :class="{ 'border-gold-accent text-navy-dark': activeTab === 'tab{{ $index }}', 'border-transparent text-gray-500': activeTab !== 'tab{{ $index }}' }"
                                class="px-6 py-3 font-display font-bold border-b-2 transition-colors">
                            {{ $plan->type }}
                        </button>
                        @endforeach
                    </div>
                    @foreach ($property->floorPlans as $index => $plan)
                    <div x-show="activeTab === 'tab{{ $index }}'" x-transition>
                        <a href="{{ asset('storage/' . $plan->image) }}" data-fancybox="floorplan" data-caption="{{ $plan->name }}">
                            <img src="{{ asset('storage/' . $plan->image) }}" alt="{{ $plan->type }} Floor Plan" class="rounded-2xl shadow-lg w-full">
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Gallery Section -->
                <div class="mb-16" id="gallery" data-animate="fade-up">
                    <h2 class="font-display text-4xl text-navy-dark font-bold mb-6">Gallery</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($property->galleries as $item)
                        <a href="{{ asset('storage/' . $item->image) }}" data-fancybox="gallery" data-caption="{{ $item->name }}" class="group block overflow-hidden rounded-lg">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Location Advantage Section -->
                @php $advantages = $property->locationAdvantages->groupBy('type'); @endphp
                @if($property->locationAdvantages->count())
                <div class="mb-16" id="location" x-data="{ activeTab: '{{ Str::slug(array_key_first($advantages->toArray())) }}' }" data-animate="fade-up">
                    <h2 class="font-display text-4xl text-navy-dark font-bold mb-6">Location Advantage</h2>
                     <div class="flex border-b mb-6">
                        @foreach ($advantages as $type => $items)
                        <button @click="activeTab = '{{ Str::slug($type) }}'" 
                                :class="{ 'border-gold-accent text-navy-dark': activeTab === '{{ Str::slug($type) }}', 'border-transparent text-gray-500': activeTab !== '{{ Str::slug($type) }}' }"
                                class="px-6 py-3 font-display font-bold border-b-2 transition-colors capitalize">
                            {{ $type }}
                        </button>
                        @endforeach
                    </div>
                    @foreach ($advantages as $type => $items)
                    <div x-show="activeTab === '{{ Str::slug($type) }}'" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($items as $item)
                        <div class="bg-gray-50 p-4 rounded-lg flex items-center">
                            <div class="bg-gold-accent/10 text-gold-accent rounded-full p-2 mr-4">&#9679;</div>
                            <p class="font-elegant text-sm text-navy-dark">{{ $item->name }} - <span class="font-bold">{{ $item->distance }}</span></p>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- FAQ Section -->
                <div id="faq" data-animate="fade-up">
                    <h2 class="font-display text-4xl text-navy-dark font-bold mb-6">Frequently Asked Questions</h2>
                    <div class="space-y-4">
                        @foreach($pfaqs as $index => $faq)
                        <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="bg-gray-50 rounded-lg border border-gray-200">
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
                </div>

            </div>

            <!-- Sidebar (Right Column) -->
            <div class="lg:col-span-4">
                <div class="sticky sticky-sidebar">
                    <div class="bg-navy-dark text-white rounded-2xl p-8" data-animate="fade-up">
                        <h3 class="font-display text-navy text-2xl font-bold mb-4">Get In Touch!</h3>
                        <form class="space-y-4" action="{{ route('enquiry.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="property">
                            <input type="hidden" name="property_name" value="{{ $property->heading }}">
                            <input type="hidden" name="page_url" value="{{ url()->current() }}">
                            <input type="text" placeholder="Your Name" name="name" required class="w-full bg-white/10 p-3 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-gold-accent border-0" />
                            <input type="email" name="email" placeholder="Your Email" required class="w-full bg-white/10 p-3 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-gold-accent border-0" />
                            <input type="text" name="mobile" placeholder="Mobile Number" required class="w-full bg-white/10 p-3 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-gold-accent border-0" />
                            <textarea name="message" placeholder="Your Message" rows="4" class="w-full bg-white/10 p-3 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-gold-accent border-0"></textarea>
                            <button type="submit" class="w-full bg-gold-accent bg-navy font-bold py-3 rounded-md hover:bg-navy/80 transition-colors duration-300 font-display">Submit Enquiry</button>
                        </form>
                    </div>
                     <div class="text-center mt-6" data-animate="fade-up">
                        <a href="{{ asset('storage/' . $property->brochure) }}" download class="inline-flex items-center justify-center w-full bg-gray-100 text-navy-dark font-bold py-3 rounded-md hover:bg-gray-200 transition-colors duration-300 font-display shadow-md">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download Brochure
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: MAIN CONTENT SECTION                                                         -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: TRENDING PROJECTS SECTION                                                  -->
<!-- =================================================================================== -->
@if(isset($trendingProperties) && $trendingProperties->count() > 0)
<section class="bg-gray-50 py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="font-display text-4xl text-navy-dark font-bold">Trending <span class="text-gold-accent">Projects</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto font-elegant mt-2">Browse our most sought-after listings loved by clients and investors alike.</p>
            </div>
            <div class="swiper prolisting_slider">
                <div class="swiper-wrapper pb-16">
                    @foreach($trendingProperties as $item)
                    <div class="swiper-slide h-full">
                        <div class="bg-white rounded-lg overflow-hidden group h-full flex flex-col border hover:border-gold-accent shadow-lg hover:shadow-xl transition-all duration-300">
                            <a href="{{ url('property/' . $item->slug) }}" class="block relative overflow-hidden">
                                <img src="{{ asset('storage/' . $item->main_image) }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" alt="{{$item->heading}}" />
                                @if($item->is_featured)
                                    <span class="absolute top-4 left-4 bg-gold-accent text-white text-xs font-bold px-3 py-1 rounded-full">FEATURED</span>
                                @endif
                            </a>
                            <div class="p-6 flex flex-col flex-grow">
                                <h3 class="font-display text-xl text-navy-dark font-bold mb-2 truncate">
                                    <a href="{{ url('property/' . $item->slug) }}" class="hover:text-gold-accent transition">{{$item->heading}}</a>
                                </h3>
                                <p class="text-gray-500 text-sm mb-4 font-elegant">By {{ optional($item->builder)->name ?? 'N/A' }}</p>
                                <div class="space-y-3 text-gray-700 font-elegant text-sm">
                                    <p class="flex items-center"><span class="text-gold-accent mr-2">&#9679;</span> {{ $item->location }}</p>
                                    <p class="flex items-center"><span class="text-gold-accent mr-2">&#9679;</span> Price: {{ $item->price }}</p>
                                    <p class="flex items-center"><span class="text-gold-accent mr-2">&#9679;</span> {{ $item->configuration }}</p>
                                </div>
                                <a href="{{ url('property/' . $item->slug) }}" class="inline-block mt-auto pt-4 font-display text-navy-dark font-bold group/link">
                                    Explore Project <span class="inline-block transition-transform duration-300 group-hover/link:translate-x-1">&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="propdots swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- =================================================================================== -->
<!-- END: TRENDING PROJECTS SECTION                                                    -->
<!-- =================================================================================== -->

<!-- =================================================================================== -->
<!-- START: TESTIMONIALS SECTION                                                       -->
<!-- =================================================================================== -->
<x-testimonial-section 
    :testimonials="$testimonials" 
    :global-settings="$global_settings" 
    :gray-bg="true" 
/>
<!-- =================================================================================== -->
<!-- END: TESTIMONIALS SECTION                                                         -->
<!-- =================================================================================== -->


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5/dist/fancybox/fancybox.umd.js"></script>
<script type="text/javascript" src="{{url('')}}/frontend_assets/js/arya.js"></script>
<script>
    function initializeSliders() {
        const prolisting_slider = new Swiper('.prolisting_slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.propdots',
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });

        const testimonial_slider = new Swiper('.testimonial_slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.testimonial-pagination',
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    }

    function waitForSwiper() {
        if (typeof Swiper !== 'undefined') {
            initializeSliders();
        } else {
            setTimeout(waitForSwiper, 100);
        }
    }

document.addEventListener("DOMContentLoaded", function () {
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    // Table of Contents Auto-generation
    const contentArea = document.querySelector(".prose"); 
    const tocList = document.getElementById("generated-toc");

    if (contentArea && tocList) {
        const headings = contentArea.querySelectorAll("h5, h6");
        if(headings.length > 0) {
            headings.forEach((heading, index) => {
                const id = `heading-anchor-${index}`;
                heading.setAttribute("id", id);

                const li = document.createElement("li");
                const a = document.createElement("a");
                a.href = `#${id}`;
                a.textContent = heading.textContent;
                a.className = "hover:text-gold-accent transition-colors";
                
                a.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });

                li.appendChild(a);
                tocList.appendChild(li);
            });
        } else {
            tocList.closest('.bg-gray-50').style.display = 'none';
        }
    }

    waitForSwiper();
});
</script>
@endpush 

@stop
