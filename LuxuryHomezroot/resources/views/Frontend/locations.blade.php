@extends('layouts.master') @section('title','Locations | Luxury Homez') @section('description','Luxury Homez Description') @section('content') @push('styles')
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/developers.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/hoztab.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/allprojects.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/aresponsive.css" />
<style>
    .banner.home-banner .banner-wrapper {
        bottom: 10%;
    }

.banner.home-banner .content .search-div {
    bottom: 5px;
}
</style>
@endpush

<div class="banner home-banner">
    {{-- If video --}}
    @if($banner && $banner->type === 'video' && $banner->video)
        <div class="bg">
            <video playsinline autoplay muted loop width="100%" height="600">
                <source src="{{ asset('storage/app/public/' . $banner->video) }}" type="video/mp4" />
            </video>
        </div>
        <div class="banner-wrapper">
            <div class="container">
                <div class="content content-white text-center ar-resp-flx">
                     <span class="span-a">{{ $banner->sub_heading }} </span>
                    @php
                    $words = explode(' ', $banner->heading); // ['Prestigious', 'Address']
                    @endphp
                    <h1>
                        @foreach($words as $word)
                            <span>{{ substr($word, 0, 1) }}</span>{{ substr($word, 1) }}
                        @endforeach
                    </h1>
                    <p data-animate="fade-up" data-animate-delay="300" class="kmr-animate">{!! $banner->description !!}</p>
                    <x-search-bar />
                </div>
            </div>
        </div>
    
    {{-- If image slider --}}
    @elseif($banner && $banner->type === 'image' && $banner->images->count())
        <div class="ar-bg">
            <div class="ar-hero-section">
                <div class="ar-hero-slider" id="ar-hero-slider">
                    @foreach($banner->images as $image)
                        <div class="ar-hero-slide" style="background-image: url('{{ asset('storage/app/public/' . $image->image) }}');"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="banner-wrapper">
            <div class="container">
                <div class="content content-white text-center ar-resp-flx">
                     <span class="span-a">{{ $banner->sub_heading }} </span>
                    @php
                    $words = explode(' ', $banner->heading); // ['Prestigious', 'Address']
                    @endphp
                    <h1>
                        @foreach($words as $word)
                            <span>{{ substr($word, 0, 1) }}</span>{{ substr($word, 1) }}
                        @endforeach
                    </h1>
                    <p data-animate="fade-up" data-animate-delay="300" class="kmr-animate">{!! $banner->description !!}</p>
                    <x-search-bar />
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Main div -->
<section>
    <div class="home-secC sec-pad ar-loc-pd">
        <div class="container">
            <div class="ar-dev-abt">
                <div class="heading">
                    <div class="heading_wrapper">
                        <div class="line"></div>
                        @php
                        $headingParts = explode('||', $global_settings->locationPFSheading);
                    @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }}
                        @if(isset($headingParts[1]))
                            <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                        <div class="line"></div>
                    </div>
                   <p>{!!  $global_settings->locationPFSsubparagraph !!}</p>
                </div>

                <div>
                    <div class="ar-devd-cnt">
                        <p>
                            {!!  $global_settings->locationPFSparagraph !!}
                        </p>
                    </div>
                </div>
                <div class="btn_wrapper text-center">
                    <div class="btn btn-btn border-black" style="cursor: pointer;" data-model=".enquire-pop">Enquire Now</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main div -->

<!-- location cards -->
<section>
    <div class="home-secB sec-pad ar-loc-pd">
        <div class="container over_hidden">
            <div class="property_grid ar-locat-grid swiper ar-p">
            @foreach($cities as $city)
                <div class="item-md">
                    <a href="{{ route('city.properties', $city->slug) }}" class="figure"  rel="noopener noreferrer">
                        <img src="{{ url('storage/app/public/' . $city->main_image) }}" alt="{{ $city->city_name }}" />
                    </a>
                    <figcaption>
                        <h2>{{ $city->city_name }}</h2>
                        <p>{{ $city->punchline }}</p>
                    </figcaption>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
<!-- location cards -->


<x-testimonial-section :testimonials="$testimonials" :global-settings="$global_settings" />

@push('scripts') @endpush @stop
