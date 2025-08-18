@extends('layouts.master') @section('title', 'Luxury Homez') @section('description', 'Luxury Homez Description') @section('content') @push('styles')
@vite([
    'frontend_assets/sass/home/home.css',
    'frontend_assets/css/developers.css',
    'frontend_assets/css/hoztab.css',
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/aresponsive.css'
])

<style>
    .ar-hero-section {
        height: 100vh;
    }

    .ar-bg {
        line-height: 0;
        height: 100vh;
    }

    .banner.home-banner .content .search-div {
        bottom: 5px;
    }
</style>

@endpush

<div class="banner home-banner">
    {{-- If video --}} @if($banner && $banner->type === 'video' && $banner->video)
    <div class="bg">
        <video playsinline autoplay muted loop width="100%" height="600">
            <source src="{{ asset('storage/' . $banner->video) }}" type="video/mp4" />
        </video>
    </div>
    <div class="banner-wrapper"> 
        <div class="container">
            <div class="content content-white text-center ar-resp-flx">
                <span class="span-a">{{ $banner->sub_heading }} </span>
                @php $words = explode(' ', $banner->heading); // ['Prestigious', 'Address'] @endphp
                <h1>
                    @foreach($words as $word)
                    <span>{{ substr($word, 0, 1) }}</span>{{ substr($word, 1) }} @endforeach
                </h1>
                <p data-animate="fade-up" data-animate-delay="300" class="kmr-animate">{!! $banner->description !!}</p>
                <x-search-bar />
            </div>
        </div>
    </div>

    {{-- If image slider --}} @elseif($banner && $banner->type === 'image' && $banner->images->count())
    <div class="ar-bg">
        <div class="ar-hero-section">
            <div class="ar-hero-slider" id="ar-hero-slider">
                @foreach($banner->images as $image)
                <div class="ar-hero-slide" style="background-image: url('{{ asset('storage/' . $image->image) }}');"></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="banner-wrapper">
        <div class="container">
            <div class="content content-white text-center ar-resp-flx">
                <span class="span-a">your next </span>
                @php $words = explode(' ', $banner->heading); // ['Prestigious', 'Address'] @endphp
                <h1>
                    @foreach($words as $word)
                    <span>{{ substr($word, 0, 1) }}</span>{{ substr($word, 1) }} @endforeach
                </h1>
                <p data-animate="fade-up" data-animate-delay="300" class="kmr-animate">{!! $banner->description !!}</p>
                <x-search-bar />
            </div>
        </div>
    </div>
    @endif
</div>

<section>
    <div class="home-secA sec-pad">
        <div class="container over_hidden">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                    @php $headingParts = explode('||', $global_settings->home_sec1_heading); @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }} @if(isset($headingParts[1]))
                        <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
                <p>{!! $global_settings->home_sec1_paragraph !!}</p>
            </div>
            <div class="client_wrapper">
                <div class="client_slider swiper">
                    <div class="swiper-wrapper">
                        @foreach($builders as $builder)
                        <a class="swiper-slide item" href="{{ url('developer/' . $builder->slug) }}">
                            <img src="{{ url('storage/' . $builder->logo) }}" alt="{{ $builder->name }}" />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="home-secB sec-pad">
        <div class="container over_hidden">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                    @php $headingParts = explode('||', $global_settings->home_sec2_heading); @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }} @if(isset($headingParts[1]))
                        <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
                <p>{!! $global_settings->home_sec2_paragraph !!}</p>
            </div>
            
            
            <div class="property_grid swiper">
                @php $animations = ['fade-down', 'fade-up']; @endphp @foreach ($subtypes as $index => $subtype)
                <div class="item-md" data-animate="{{ $animations[$index % 2] }}">
                    <a href="{{ route('property.by.subtype', $subtype->slug) }}" class="figure"  rel="noopener noreferrer">
                        <img src="{{ asset('uploads/psubtypes/' . $subtype->main_image) }}" alt="{{ $subtype->psubtype_name }}" />
                    </a>
                    <figcaption>
                        <h2>{{ $subtype->psubtype_name }}</h2>
                    </figcaption>
                </div>
                @endforeach
            </div>
            
            
        </div>
    </div>
</section>
<section>
    <div class="home-secC sec-pad">
        <div class="container">
            <div class="upper_sec heading">
                <div class="icon">
                    <img src="{{ Vite::asset('frontend_assets/images/fav_sec.png') }}" alt="" />
                </div>
                <div class="heading_wrapper ar-mt">
                    <div class="line"></div>
                    @php $headingParts = explode('||', $global_settings->home_sec3_heading); @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }} @if(isset($headingParts[1]))
                        <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
            </div>

            <div class="count-wrap">
                @foreach($statistics as $statistic)
                <div class="count-info-wrap">
                    <div class="count-info">
                        <div class="upper_wrap">
                            <img src="{{ url('storage/' . $statistic->icon_path) }}" alt="{{ $statistic->count }}" class="svg" />
                            <h5><span class="count" data-count="{{ $statistic->count }}">{{ $statistic->count }}</span>+</h5>
                        </div>
                        <p>
                            {{ $statistic->label }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section>
    <div class="home-secD sec-pad gray-bg">
        <div class="container over_hidden">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                    @php $headingParts = explode('||', $global_settings->home_sec4_heading); @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }} @if(isset($headingParts[1]))
                        <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
                <p>{!! $global_settings->home_sec4_paragraph !!}</p>
            </div>
            <div class="property_listing">
                <div class="prolisting_slider swiper">
                    <div class="swiper-wrapper">
                        @foreach($homeproperties as $item)
                        <div class="swiper-slide">
                            <div class="prop_col">
                                <a href="{{ url('property/' . $item->slug) }}"><figure>
                                    <img src="{{ asset('storage/' . $item->main_image) }}" class="prop_img" alt="{{$item->heading}}" />
                                    <a href="{{ url('property/' . $item->slug) }}" class="exp_pro" target="_blank" rel="noopener noreferrer"> Explore projects <x-vite-svg name="top-right" alt="Explore" /> </a>
                                    @if($item->is_featured)
                                    <span class="stick">featured</span>
                                    @endif
                                </figure></a>
                                <figcaption>
                                    <a href="{{ url('property/' . $item->slug) }}" target="_blank" rel="noopener noreferrer"> <h6>{{$item->heading}}</h6></a>
                                    <p class="ar-pt">By {{ optional($item->builder)->name ?? 'N/A' }}</p>
                                    <ul class="details">
                                        <li class="loc">
                                            <img class="arsvg ar-smooth-blink" src="{{ Vite::asset('frontend_assets/icon/mappin1.svg') }}" alt="" />
                                            <p>{{$item->location}}</p>
                                        </li>
                                        <li>
                                            <img class="svg" src="{{ Vite::asset('frontend_assets/icon/rupee.svg') }}" alt="" />
                                            <p>{{$item->price}}</p>
                                        </li>
                                        <li>
                                            <img class="svg" src="{{ Vite::asset('frontend_assets/icon/hotel.svg') }}" alt="" />
                                            <p>{{$item->configuration}}</p>
                                        </li>
                                    </ul>
                                </figcaption>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="propdots"></div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="banner promo ar-z-index">
        <div class="bg">
            <div class="banner-wrapper">
                <div class="content over_hidden">
                    <div class="text" data-animate="fade-right">
                        <h5>{{ $global_settings->home_sec5_heading }}</h5>
                        <p>{!! $global_settings->home_sec5_paragraph !!}</p>
                    </div>
                    <a href="{{  $global_settings->home_sec5_link }}" class="btn btn-btn" data-animate="fade-left">Get in touch</a>
                </div>
            </div>
        </div>
    </div>
</section>

@php $statusLabels = [ 'new-launch' => 'New Launch', 'pre-launch' => 'Pre-Launch', 'under-construction' => 'Under Construction', 'ready-to-move' => 'Ready To Move', 'completed' => 'Completed', 'resale' => 'Resale', 'available' =>
'Available', 'sold-out' => 'Sold Out', 'coming-soon' => 'Coming Soon', ]; @endphp

<section>
    <div class="home-secE sec-pad">
        <div class="container">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                    @php $headingParts = explode('||', $global_settings->home_sec6_heading); @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }} @if(isset($headingParts[1]))
                        <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
                <p>{!! $global_settings->home_sec6_paragraph !!}</p>
            </div>
            <div class="prop_types_wrapper">
                <ul class="tab-nav prop_nav">
                    @foreach($availableStatuses as $status)
                    <li data-tab="{{ str_replace('-', '_', $status) }}" class="{{ $loop->first ? 'active' : '' }}">
                        {{ $statusLabels[$status] ?? ucwords(str_replace('-', ' ', $status)) }}
                    </li>
                    @endforeach
                </ul>
                <div class="tab-nav-content prop_nav_content over_hidden">
                    @foreach($availableStatuses as $status)
                    <div class="tabs {{ $loop->first ? 'active' : '' }}" data-tab="{{ str_replace('-', '_', $status) }}" data-animate="fade-out">
                        @foreach($propertiesByStatus[$status] as $property)
                        <div class="prop_col">
                               <a href="{{ url('property/' . $property->slug) }}"> <figure>
                                    <img src="{{ asset('storage/' . $property->main_image) }}" class="prop_img" alt="{{$property->heading}}" />
                                    <a href="{{ url('property/' . $property->slug) }}" class="exp_pro" target="_blank" rel="noopener noreferrer"> Explore projects <img src="{{ Vite::asset('frontend_assets/icon/top-right.svg') }}" alt="" /> </a>
                                    @if($item->is_featured)
                                    <span class="stick">featured</span>
                                    @endif
                                </figure></a>
                                <figcaption>
                                    <a href="{{ url('property/' . $property->slug) }}" target="_blank" rel="noopener noreferrer"> <h6>{{$property->heading}}</h6></a>
                                    <p class="ar-pt">By {{ optional($property->builder)->name ?? 'N/A' }}</p>
                                    <ul class="details">
                                        <li class="loc">
                                            <img class="arsvg ar-smooth-blink" src="{{ Vite::asset('frontend_assets/icon/mappin1.svg') }}" alt="" />
                                            <p>{{$property->location}}</p>
                                        </li>
                                        <li>
                                            <img class="svg" src="{{ Vite::asset('frontend_assets/icon/rupee.svg') }}" alt="" />
                                            <p>{{$property->price}}</p>
                                        </li>
                                        <li>
                                            <img class="svg" src="{{ Vite::asset('frontend_assets/icon/hotel.svg') }}" alt="" />
                                            <p>{{$property->configuration}}</p>
                                        </li>
                                    </ul>
                                </figcaption>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                <!--<div class="btn_wrapper text-center" data-animate="fade-up">-->
                <!--    <a href="all-projects.html" target="_blank" rel="noopener noreferrer">-->
                <!--        <div class="btn btn-btn border-black">-->
                <!--            Explore All-->
                <!--            <img src="{{url('')}}/frontend_assets/icon/right-arrow.svg" alt="" class="svg" />-->
                <!--        </div>-->
                <!--    </a>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</section>

<section>
    <div class="home-secF sec-pad gray-bg">
        <div class="container">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                    @php $headingParts = explode('||', $global_settings->home_sec7_heading); @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }} @if(isset($headingParts[1]))
                        <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
                <p>{!! $global_settings->home_sec7_paragraph !!}</p>
            </div>
            <div class="global_slider_sec">
                {{-- First Row (Top Slider): only first 4 items --}}
                <div class="top_slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($cities->take(4) as $city)
                        <div class="swiper-slide">
                            <div class="item-md global_col">
                                <a href="{{ route('city.properties', $city->slug) }}" class="figure">
                                    <img src="{{ url('storage/' . $city->main_image) }}" alt="{{ $city->city_name }}" />
                                </a>
                                <figcaption>
                                    <h2>{{ $city->city_name }}</h2>
                                </figcaption>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Second Row (Bottom Slider): remaining items --}}
                <div class="bottom_slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($cities->skip(4) as $city)
                        <div class="swiper-slide">
                            <div class="item-md global_col">
                                <a href="{{ route('city.properties', $city->slug) }}" class="figure">
                                    <img src="{{ url('storage/' . $city->main_image) }}" alt="{{ $city->city_name }}" />
                                </a>
                                <figcaption>
                                    <h2>{{ $city->city_name }}</h2>
                                </figcaption>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<x-testimonial-section :testimonials="$testimonials" :global-settings="$global_settings" />

<section>
    <div class="home-secH sec-pad gray-bg">
        <div class="container over_hidden">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                    @php $headingParts = explode('||', $global_settings->home_sec9_heading); @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }} @if(isset($headingParts[1]))
                        <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
                <p>{!! $global_settings->home_sec9_paragraph !!}</p>
            </div>
            <div class="blogs_wrapper">
                @foreach($blogs as $blog)
                <div class="blogs_col">
                    @php $blogUrl = url('blog/' . $blog->slug); @endphp
                    <figure>
                        <a href="{{ $blogUrl }}" class="figure" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('storage/' . $blog->main_image) }}" alt="{{ $blog->heading }}" />
                        </a>
                    </figure>
                    <figcaption>
                        <h5>{{ $blog->heading }}</h5>
                        <p>{!! $blog->short_content !!}</p>
                        <div class="btn_wrapper">
                            <a href="{{ $blogUrl }}" class="readMore" target="_blank" rel="noopener noreferrer">Read More <img src="{{ Vite::asset('frontend_assets/icon/right-arrow.svg') }}" class="svg" alt="" /></a>
                            <span class="social_toggle">
                                <a href="javascript:;" class="shareBtn">Share Now <img src="{{ Vite::asset('frontend_assets/icon/blogshare.svg') }}" class="ar-share-icon" alt="" /></a>
                                <ul class="social">
                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($blogUrl) }}" target="_blank">
                                            <img src="{{ Vite::asset('frontend_assets/images/home/bfacebook.png') }}" class="ar-social-icon" alt="Facebook" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode($blogUrl) }}" target="_blank">
                                            <img src="{{ Vite::asset('frontend_assets/images/home/btwitter.png') }}" class="ar-social-icon" alt="Twitter" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($blogUrl) }}" target="_blank">
                                            <img src="{{ Vite::asset('frontend_assets/images/home/blinkedin.png') }}" class="ar-social-icon" alt="LinkedIn" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($blogUrl) }}" target="_blank">
                                            <img src="{{ Vite::asset('frontend_assets/images/home/bwhatsapp.png') }}" class="ar-social-icon" alt="WhatsApp" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:?subject=Check this out&body={{ urlencode($blogUrl) }}">
                                            <img src="{{ Vite::asset('frontend_assets/images/home/bemail.png') }}" class="ar-social-icon" alt="Email" />
                                        </a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </figcaption>
                    <time>{{ $blog->created_at->format('d-M-Y') }}</time>
                </div>
                @endforeach
            </div>
            <div class="btn_wrapper text-center" data-animate="fade-up">
                <!--<a href="/blogs" target="_blank" rel="noopener noreferrer"><div class="btn btn-btn border-black">Explore All-->
                <!--    <img src="{{ Vite::asset('frontend_assets/icon/right-arrow.svg') }}" alt="" class="svg"> -->
                <!--</div></a>-->
            </div>
        </div>
    </div>
</section>
@push('scripts') @endpush @stop