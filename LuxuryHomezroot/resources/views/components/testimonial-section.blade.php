@props(['testimonials', 'globalSettings', 'grayBg' => false])

<section class="{{ $grayBg ? 'bg-gray-50' : 'bg-navy' }} py-24" data-animate="fade-up">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            @php $headingParts = explode('||', $globalSettings->home_sec8_heading); @endphp
            <h2 class="font-display text-4xl {{ $grayBg ? 'text-navy' : 'text-white' }} mb-4">
                {{ $headingParts[0] ?? '' }} <span class="text-golden">{{ $headingParts[1] ?? '' }}</span>
            </h2>
            <p class="{{ $grayBg ? 'text-gray-600' : 'text-gray-300' }} max-w-2xl mx-auto">{!! $globalSettings->home_sec8_paragraph !!}</p>
        </div>

        <div class="swiper testimonial_slider w-full relative">
            <div class="swiper-wrapper py-16">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide h-full">
                        <div class="{{ $grayBg ? 'bg-white' : 'bg-white/10' }} p-8 rounded-lg h-full flex flex-col text-center">
                            <svg class="w-10 h-10 text-golden mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18"><path d="M6.62 1.833A1 1 0 005.38.65L.21 12.15a1 1 0 00.9 1.28h.21a1 1 0 00.9-1.28L6.62 1.833zM12.62 1.833A1 1 0 0011.38.65L6.21 12.15a1 1 0 00.9 1.28h.21a1 1 0 00.9-1.28l4.31-10.3z"/></svg>
                            <p class="{{ $grayBg ? 'text-gray-600' : 'text-gray-300' }} italic mb-6 flex-grow">"{!! $testimonial->message !!}"</p>
                            <h3 class="font-display text-xl {{ $grayBg ? 'text-navy' : 'text-white' }} font-bold">{{ $testimonial->name }}</h3>
                            <p class="text-golden text-sm">{{ $testimonial->position }}</p>
                            <div class="flex justify-center mt-4">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $testimonial->star ? 'text-golden' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                @endfor
                            </div>
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