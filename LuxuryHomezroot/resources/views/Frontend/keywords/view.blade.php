@extends('layouts.master') @section('title', $keyword->text) @section('content') @push('styles')
<link rel="stylesheet" href="{{ url('') }}/frontend_assets/css/allprojects.css" />
<link rel="stylesheet" href="{{ url('') }}/frontend_assets/css/developers.css" />
<link rel="stylesheet" href="{{ url('') }}/frontend_assets/css/property.css" />
<link rel="stylesheet" href="{{ url('') }}/frontend_assets/css/fancybox.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/aresponsive.css" />
@endpush

<section>
    <div class="global_slider_sec">
        <!-- keyword_slider -->
        <div class="keyword_slider swiper">
            <div class="swiper-wrapper">
                @foreach($properties as $property)
                <div class="swiper-slide">
                    <div class="item-md global_col ar-key-height">
                        <a href="{{ url('property/' . $property->slug) }}" class="figure">
                            <img src="{{ asset('storage/app/public/' . $property->main_image) }}" alt="{{ $property->heading }}" />
                        </a>
                        <div class="ar-key-center">
                            <div class="ar-keyslides-section">
                                <div class="ar-keyslides-top">
                                    <h2>{{ $property->heading }}</h2>
                                    <p>{{ $property->location }}</p>
                                </div>
                                <div class="ar-keyslides-bottom">
                                    <div class="ar-keyslides-left">
                                        <div class="ar-keyslides-item">
                                            <h4>Price</h4>
                                            <p>{{ $property->price }}</p>
                                        </div>
                                        <div class="ar-keyslides-item">
                                            <h4>Sizes</h4>
                                            <p>{{ $property->unit_size ?? 'N/A' }}</p>
                                        </div>
                                        <div class="ar-keyslides-item">
                                            <h4>Configurations</h4>
                                            <p>{{ $property->configuration ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <button class="btn-one smoth-scroll btn border-black ar-keyslides-right-button" onclick="openModal(this)" data-title-first="Enquire" data-title-highlight="Now" data-model=".enquire-pop">
                                        Enquire Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Main div -->
<section>
    <div class="home-secC sec-pad ar-key-pd gray-bg">
        <div class="container">
            <div class="ar-dev-abt">
                <div class="heading">
                    <div class="heading_wrapper">
                        <div class="line"></div>
                        @php $headingParts = explode('||', $keyword->text); @endphp
                        <h2>
                            {{ $headingParts[0] ?? '' }} @if(isset($headingParts[1]))
                            <span>{{ $headingParts[1] }}</span>
                            @endif
                        </h2>
                        <div class="line"></div>
                    </div>
                </div>

                <div>
                    <div class="ar-devd-cnt">
                        <p>{!! $keyword->content !!}</p>
                    </div>
                </div>
                <div class="btn_wrapper text-center">
                    <div class="btn btn-btn border-black" onclick="openModal(this)" data-title-first="Enquire" data-title-highlight="Now" style="cursor: pointer;" data-model=".enquire-pop">Enquire Now</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main div -->

<!-- projects -->
<section>
    <div class="home-secE ar-key-pd">
        <div class="container">
            <div class="prop_types_wrapper">
                <div class="tab-nav-content prop_nav_content over_hidden">
                    <div class="tabs active" data-tab="new_launch" data-animate="fade-out">
                        @if($properties->count() > 0) @foreach($properties as $item)
                        <div class="prop_col">
                            <a href="{{ url('property/' . $item->slug) }}">
                                <figure>
                                    <img src="{{ asset('storage/app/public/' . $item->main_image) }}" class="prop_img" alt="{{ $item->heading }}" />
                                    <a href="{{ url('property/' . $item->slug) }}" class="exp_pro"> Explore projects <img src="{{url('')}}/frontend_assets/icon/top-right.svg" alt="" /> </a>
                                    <span class="stick">
                                        {{ $item->property_status }}
                                    </span>
                                </figure>
                            </a>
                            <figcaption>
                                <h6>{{ $item->heading }}</h6>
                                <p class="ar-pt">By {{ optional($item->builder)->name ?? 'N/A' }}</p>
                                <ul class="details">
                                    <li class="loc">
                                        <img class="arsvg ar-smooth-blink" src="{{url('')}}/frontend_assets/icon/mappin1.svg" alt="" />
                                        <p>{{ $item->location }}</p>
                                    </li>
                                    <li>
                                        <img class="svg" src="{{url('')}}/frontend_assets/icon/rupee.svg" alt="" />
                                        <p>{{ $item->price }}</p>
                                    </li>
                                    <li>
                                        <img class="svg" src="{{url('')}}/frontend_assets/icon/hotel.svg" alt="" />
                                        <p>{{ $item->configuration }}</p>
                                    </li>
                                </ul>
                            </figcaption>
                        </div>
                        @endforeach @else
                        <div class="d-flex justify-content-center align-items-center" style="min-height: 300px; text-align: center;">
                            <div>
                                <h4>No properties found for this keyword.</h4>
                                <p>Please try a different keyword or check back later.</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!--<div class="btn_wrapper text-center" data-animate="fade-up">-->
                <!--    <div class="btn btn-btn border-black">Load More-->
                <!--        <img src="{{url('')}}/frontend_assets/icon/right-arrow.svg" alt="" class="svg">-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</section>
<!-- projects -->

<!-- faq -->
<section class="sec-pad ar-key-pd gray-bg">
    <div class="home-secF">
        <div class="container">
            <div class="ar-faqs-card">
                <div class="ar-faqs-header">
                    <h2 class="ar-heading">Frequently <span>Asked Questions</span></h2>
                </div>

                <div class="ar-faqs-body">
                    <div class="ar-faq-container">
                        <div class="ar-faq-accordion">
                            @foreach($kfaqs as $index => $faq)
                                <div class="ar-faq-item">
                                    <input class="ar-faq-hidden" type="checkbox" id="ar-faq-q{{ $index }}" {{ $index === 0 ? 'checked' : '' }} />
                                    <label class="ar-faq-question" for="ar-faq-q{{ $index }}">
                                        Q. {{ $faq->question }}
                                    </label>

                                    <div class="ar-faq-answer">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- faq -->


<!-- testimonials -->
<section>
    <div class="home-secG sec-pad ar-key-pd">
        <div class="container">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                    @php $headingParts = explode('||', $global_settings->home_sec8_heading); @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }} @if(isset($headingParts[1]))
                        <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
                <p>{!! $global_settings->home_sec8_paragraph !!}</p>
            </div>
            <div class="property_slider swiper ar-testimonial-pb" data-animate="fade-out" data-animate-delay="500">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimony_col">
                            <img src="{{url('')}}/frontend_assets/icon/quotes.svg" class="svg" alt="" />
                            <h5 class="name">{{ $testimonial->name }}</h5>
                            <p>{{ $testimonial->position }}</p>
                            <div class="stars">
                                <img src="{{url('')}}/frontend_assets/icon/stars.svg" alt="" />
                                <img src="{{url('')}}/frontend_assets/icon/stars.svg" alt="" />
                                <img src="{{url('')}}/frontend_assets/icon/stars.svg" alt="" />
                                <img src="{{url('')}}/frontend_assets/icon/stars.svg" alt="" />
                                <img src="{{url('')}}/frontend_assets/icon/stars.svg" alt="" />
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
<!-- testimonials -->

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
@endpush @stop
