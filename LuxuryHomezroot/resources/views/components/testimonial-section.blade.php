@props(['global_settings', 'testimonials'])

<!-- Testimonial Section -->
<section class="bg-[#081521] py-24 w-full overflow-hidden" data-animate="fade-up">
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
        </div>
    </div>
</section>

@push('scripts')
<script>
    function initTestimonialSlider() {
        if (typeof Swiper !== 'undefined' && document.querySelector('.testimonial_slider')) {
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
        } else {
            setTimeout(initTestimonialSlider, 100);
        }
    }
    initTestimonialSlider();
</script>
@endpush