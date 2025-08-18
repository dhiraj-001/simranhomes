<section>
    <div class="home-secG sec-pad">
        <div class="container">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                    @php
                        $headingParts = explode('||', $globalSettings->home_sec8_heading);
                    @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }}
                        @if(isset($headingParts[1]))
                            <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
                <p>{!! $globalSettings->home_sec8_paragraph !!}</p>
            </div>

            <div class="property_slider swiper ar-testimonial-pb" data-animate="fade-out" data-animate-delay="500">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimony_col">
                                <img src="{{ Vite::asset('frontend_assets/icon/quotes.svg') }}" class="svg" alt="" />
                                <h5 class="name">{{ $testimonial->name }}</h5>
                                <p>{{ $testimonial->position }}</p>
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $testimonial->star)
                                            <img src="{{ Vite::asset('frontend_assets/icon/stars.svg') }}" alt="Star" />
                                        @else
                                            <!--<img src="{{ url('frontend_assets/icon/star-outline.svg') }}" alt="Star" />-->
                                        @endif
                                    @endfor
                                </div>
                                <div class="desc">
                                    <p>{!! $testimonial->message !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
