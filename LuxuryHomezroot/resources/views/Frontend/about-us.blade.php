@extends('layouts.master') 
@section('title','About Us | Luxury Homez') 
@section('description','Luxury Homez Description') 
@section('content') @push('styles')
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/aboutus.css" />
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

.ar-abts .abts-a {
    font-size: 22px;
    font-family: 'Poppins';
    font-weight: 200;
    letter-spacing: 2.8px;
    text-transform : uppercase;
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
                    <span class="abts-a">{{ $banner->sub_heading }} </span>
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
                    <span class="abts-a">{{ $banner->sub_heading }} </span>
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

<section class="ar-about-two-column-section ar-abouts-pd" id="about-us">
    <div class="ar-about-content-wrapper">
        <div class="ar-about-left-col ar-propt-pd0">
            <p class="ar-about-subtitle">{{ $about->subtitle }}</p>
            @php $words = explode(' ', $about->heading); $first = implode(' ', array_slice($words, 0, 4)); $span = implode(' ', array_slice($words, 4, 2)); $last = implode(' ', array_slice($words, 6)); @endphp
            <h2 class="ar-about-heading">{{ $first }} <span>{{ $span }}</span> {{ $last }}</h2>
            <div class="about-secA">
                <div class="container">
                    <div class="content-wrap">
                        <div class="desc" data-content="8">
                            {!! $about->description !!}
                        </div>
                        <button type="button" class="read-more" data-read>Read More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- founder desk -->
<section class="gray-bg">
    <div class="about-secD ar-abouts-pd">
        <div class="container">
            <div class="flex">
                <figure><img src="{{url('')}}/frontend_assets/images/about/founder.webp" alt="" /></figure>
                <figcaption>
                    <div class="content">
                        <div class="heading">
                            @php $parts = explode(' ', $founder->title, 2); @endphp
                            <h3 class="ar-founder-h3">{{ $parts[0] ?? '' }} <span>{{ $parts[1] ?? '' }}</span></h3>
                        </div>
                        <div class="desc-wrap">
                            <div class="desc">
                                <h6>{{ $founder->subtitle }}</h6>
                                {!! $founder->description !!}
                            </div>
                        </div>
                        <div class="nam-des">
                            <h6 class="name">{{ $founder->name }}</h6>
                            <p class="desg">{{ $founder->designation }}</p>
                        </div>
                    </div>
                </figcaption>
            </div>
        </div>
    </div>
</section>
<!-- founder desk -->

<section>
    <div class="about-secE ar-abouts-pd">
        <div class="container">
            <div class="about-vimi-pagination text-center"></div>
            <div class="about-vimi-slider swiper">
                <div class="swiper-wrapper">
                    <div class="item swiper-slide" data-slide="Vision">
                        <figure>
                            <img src="{{url('')}}/frontend_assets/images/about/vision.webp" alt="" />
                        </figure>
                        <figcaption>
                            <div class="content">
                                <h4>{{ $vms->visionTitle }}</h4>
                                {!! $vms->visionDescription !!}
                            </div>
                        </figcaption>
                    </div>
                    <div class="item swiper-slide" data-slide="Mission">
                        <figure>
                            <img src="{{url('')}}/frontend_assets/images/about/mission.webp" alt="" />
                        </figure>
                        <figcaption>
                            <div class="content">
                                <h4>{{ $vms->missionTitle }}</h4>
                                {!! $vms->missionDescription !!}
                            </div>
                        </figcaption>
                    </div>
                    <div class="item swiper-slide" data-slide="Strengths">
                        <figure>
                            <img src="{{url('')}}/frontend_assets/images/about/strength.webp" alt="" />
                        </figure>
                        <figcaption>
                            <div class="content">
                                <h4>{{ $vms->strengthTitle }}</h4>
                                {!! $vms->strengthDescription !!}
                            </div>
                        </figcaption>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ar-abts-why-bg">
    <div class="ar-abts-overlay-wrapper">
        <div class="ar-abts-overlay"></div>
        <!-- Background image is applied via CSS to .bg-overlay-wrapper -->
    </div>

    <div class="about-secF ar-abouts-pd">
        <div class="container">
            <div class="heading text-center">
                <h3>Reasons to Choose <span>Luxury Homez</span></h3>
                <h5>Because Luxury Is a Lifestyle</h5>
            </div>

            <div class="qlty-wrap">
                <div class="item">
                    <div class="ico">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#eb9020" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                            <path
                                d="m22.017,5.831l-1.017-.686V1.5c0-.276-.224-.5-.5-.5s-.5.224-.5.5v2.97L14.518.771c-1.528-1.032-3.504-1.033-5.035,0L1.983,5.831c-1.242.838-1.983,2.232-1.983,3.729v9.939c0,2.481,2.019,4.5,4.5,4.5h15c2.481,0,4.5-2.019,4.5-4.5v-9.939c0-1.497-.741-2.892-1.983-3.729Zm.983,13.669c0,1.93-1.57,3.5-3.5,3.5H4.5c-1.93,0-3.5-1.57-3.5-3.5v-9.939c0-1.164.577-2.249,1.542-2.901L10.042,1.599c.595-.401,1.276-.602,1.958-.602s1.363.2,1.958.602l7.5,5.061c.966.652,1.542,1.736,1.542,2.901v9.939Zm-8.462-10.5c-1.08,0-1.976.479-2.5,1.254-.524-.774-1.42-1.254-2.5-1.254-1.654,0-3,1.436-3,3.2,0,2.331,2.818,5.193,4.309,6.381.351.28.771.42,1.191.42s.84-.14,1.191-.42c1.49-1.188,4.309-4.05,4.309-6.381,0-1.765-1.346-3.2-3-3.2Zm-1.933,8.8c-.334.268-.8.266-1.135,0-1.633-1.302-3.932-3.899-3.932-5.6,0-1.213.897-2.2,2-2.2,1.178,0,2,.804,2,1.954,0,.276.224.5.5.5s.5-.224.5-.5c0-1.15.822-1.954,2-1.954,1.103,0,2,.987,2,2.2,0,1.701-2.3,4.298-3.933,5.6Z"
                            />
                        </svg>
                    </div>

                    <div class="inf">
                        <h6>Curated Luxury Listings</h6>
                    </div>
                </div>
                <div class="item">
                    <div class="ico">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#eb9020" data-name="Layer 1" id="Layer_1" viewBox="0 0 128 128">
                            <title />
                            <path
                                d="M114,14H46V5.93A1.91,1.91,0,0,1,48.08,4H75.92A2.18,2.18,0,0,1,78,6.27V10a2,2,0,0,0,4,0V6.27A6.18,6.18,0,0,0,75.92,0H48.08A5.87,5.87,0,0,0,42,5.93V14H14a8,8,0,0,0-8,8V81a8,8,0,0,0,8,8H46.71l.61-4H14a4,4,0,0,1-4-4V38H21v6a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V38H46a2,2,0,0,0,0-4H10V22a4,4,0,0,1,4-4H114a4,4,0,0,1,4,4V34H82a2,2,0,0,0,0,4H95v6a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V38h11V81a4,4,0,0,1-4,4H80.88l.58,4H114a8,8,0,0,0,8-8V22A8,8,0,0,0,114,14ZM29,42H25V38h4Zm74,0H99V38h4Z"
                            />
                            <path
                                d="M70.57,42a2,2,0,0,0,1.79-1.56l2.57-11.95,0-.1a3.85,3.85,0,0,0-.82-3.12A3.6,3.6,0,0,0,71.37,24H56.63a3.6,3.6,0,0,0-2.75,1.25,3.85,3.85,0,0,0-.82,3.12l0,.1,2.57,11.95a2,2,0,0,0,2,1.58h.33L47,113.44a2,2,0,0,0,.72,1.86l15.17,12.26a2,2,0,0,0,2.53,0l14.83-12.26a2,2,0,0,0,.7-1.83ZM52,113.56,73.24,88l.89,6.09-18.6,22.32ZM57.06,28H70.94L68.79,38H59.21Zm9.47,14,5.93,40.72L52,107.26,62,42Zm-2.37,81.42L58.64,119,74.9,99.45l2,13.47Z"
                            />
                            <circle cx="64" cy="33" r="2" />
                        </svg>
                    </div>
                    <div class="inf">
                        <h6>Local Market Expertise</h6>
                    </div>
                </div>
                <div class="item">
                    <div class="ico">
                        <svg id="Layer_1" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg" fill="#eb9020" data-name="Layer 1">
                            <path
                                d="m4 317.982 56.378 32.549a8 8 0 0 0 10.928-2.931l2.031-3.518 32.65 19.116a31.815 31.815 0 0 0 -1.163 8.525 31.288 31.288 0 0 0 9.2 22.279 31.409 31.409 0 0 0 22.279 9.214c.607 0 1.215-.024 1.822-.058-.034.6-.056 1.2-.056 1.81a31.411 31.411 0 0 0 31.479 31.479c.61 0 1.217-.022 1.822-.056-.034.605-.057 1.212-.057 1.822a31.411 31.411 0 0 0 31.479 31.48 31.915 31.915 0 0 0 6.592-.69 26.3 26.3 0 0 0 26.02 22.072 26.489 26.489 0 0 0 9.263-1.662l1.589 1.587a26.371 26.371 0 0 0 44.685-14.36 31.794 31.794 0 0 0 6.589.7 31.451 31.451 0 0 0 31.435-33.314c.6.034 1.2.055 1.81.055a31.429 31.429 0 0 0 31.436-33.3c.6.034 1.2.055 1.81.055a31.51 31.51 0 0 0 25.732-49.652l44.133-25.376 6.808 11.792a8 8 0 0 0 10.928 2.928l56.378-32.546a8 8 0 0 0 2.928-10.928l-73.941-128.069a8 8 0 0 0 -10.927-2.928l-56.378 32.55a8 8 0 0 0 -2.928 10.928l6.539 11.326-9.346 3.539a19.014 19.014 0 0 1 -13.408.271l-62.315-20.771a27.47 27.47 0 0 0 -21.235 1.448l-12.4 6.112c-.117-.07-.23-.145-.353-.21l-14.771-7.8a27.745 27.745 0 0 0 -25.91-.158l-19.718 10.1a10.3 10.3 0 0 1 -4.888 1.309l-47 .538 3.294-5.707a8 8 0 0 0 -2.928-10.928l-56.375-32.547a8 8 0 0 0 -10.927 2.928l-73.941 128.069a8 8 0 0 0 2.928 10.928zm121.337 64.71a15.575 15.575 0 0 1 0-21.932l28.132-28.132a15.508 15.508 0 0 1 21.93 21.933l-28.13 28.131a15.528 15.528 0 0 1 -21.932 0zm33.246 33.245a15.575 15.575 0 0 1 -.007-21.925l.007-.007 28.132-28.131a15.508 15.508 0 0 1 21.931 21.931l-28.132 28.132a15.526 15.526 0 0 1 -21.931 0zm33.245 33.245a15.525 15.525 0 0 1 0-21.932l28.131-28.131a15.508 15.508 0 0 1 21.932 21.932 8 8 0 0 0 -.743.871 26.481 26.481 0 0 0 -2.394 2.112l-22.012 22.01a26.686 26.686 0 0 0 -2.116 2.4 8.041 8.041 0 0 0 -.867.74 15.525 15.525 0 0 1 -21.931-.002zm36.23 22.875a10.4 10.4 0 0 1 0-14.7l22.01-22.01a10.393 10.393 0 0 1 14.7 14.7l-22.01 22.01a10.447 10.447 0 0 1 -14.7 0zm44.209 7.633a10.4 10.4 0 0 1 -14.6.086l14.689-14.689a10.4 10.4 0 0 1 -.089 14.603zm36.233-22.874a15.525 15.525 0 0 1 -21.93 0 7.9 7.9 0 0 0 -.872-.743 26.481 26.481 0 0 0 -2.112-2.394l-1.531-1.531a26.353 26.353 0 0 0 -20.331-35.474 31.749 31.749 0 0 0 .143-12.493 15.524 15.524 0 0 1 18.5 2.572l28.133 28.132a15.524 15.524 0 0 1 0 21.931zm33.246-33.245a15.577 15.577 0 0 1 -21.93 0l-28.133-28.132a15.508 15.508 0 0 1 21.917-21.939v.006l28.132 28.131a15.525 15.525 0 0 1 .009 21.934zm33.244-33.245a15.523 15.523 0 0 1 -21.929 0l-28.133-28.132a15.508 15.508 0 0 1 21.931-21.931l28.128 28.137a15.576 15.576 0 0 1 0 21.931zm52.147-196.412 65.94 114.211-42.522 24.55-65.946-114.212zm-153.074 35.786a11.33 11.33 0 0 1 9.1-.62l62.316 20.772a35.149 35.149 0 0 0 24.136-.487l11.785-4.465 44.489 77.055-47.439 27.276-20.281-20.282a31.385 31.385 0 0 0 -7.269-5.418l-63.775-47.811a26.418 26.418 0 0 0 -13.941-5.2l-9.371-.827a27.66 27.66 0 0 0 -26.5 13.531l-12.423 20.429a1.837 1.837 0 0 1 -1.957.944l-18.9-2.38a2 2 0 0 1 -1.674-2.527l9.9-35.1a11.412 11.412 0 0 1 6.244-7.506zm-84.93 11a26.137 26.137 0 0 0 12-3.067l19.718-10.1a11.634 11.634 0 0 1 11.149.067l4.891 2.581-25.466 12.553a27.307 27.307 0 0 0 -14.569 17.513l-9.9 35.1a18 18 0 0 0 15.074 22.746l18.9 2.379a17.78 17.78 0 0 0 17.627-8.5l12.424-20.428a11.8 11.8 0 0 1 11.422-5.908l9.37.827a10.465 10.465 0 0 1 5.751 2.064l45.365 34.009a31.418 31.418 0 0 0 -18.483 28.7c0 .606.022 1.209.055 1.81a31.429 31.429 0 0 0 -33.3 31.435c0 .607.022 1.209.055 1.81a31.586 31.586 0 0 0 -16.264 3.435c-.556-.654-1.134-1.3-1.751-1.913a31.435 31.435 0 0 0 -24.1-9.156c.034-.6.055-1.2.055-1.81a31.43 31.43 0 0 0 -33.285-31.447 31.431 31.431 0 0 0 -31.435-33.289 31.289 31.289 0 0 0 -22.28 9.2l-28.081 28.089-32.738-19.171 51.314-88.88zm-104.265-46.786 42.522 24.549-65.941 114.212-42.521-24.55zm171.132 6.875a93.751 93.751 0 1 0 -93.75-93.751 93.858 93.858 0 0 0 93.75 93.751zm0-171.5a77.751 77.751 0 1 1 -77.75 77.75 77.839 77.839 0 0 1 77.75-77.751zm-35.588 78.126a8 8 0 0 1 12.943-9.407l12.245 16.852 40.763-33.392a8 8 0 0 1 10.139 12.377l-47.321 38.764a8 8 0 0 1 -11.541-1.485z"
                            />
                        </svg>
                    </div>
                    <div class="inf">
                        <h6>Transparent & Trustworthy</h6>
                    </div>
                </div>
                <div class="item">
                    <div class="ico">
                        <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" fill="#eb9020" width="512" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path
                                    d="m130.678 213.76 57.707 38.151c1.7 6.806 5.178 12.911 9.907 17.803v48.663c0 8.304 6.755 15.059 15.059 15.059h26.474c8.304 0 15.059-6.755 15.059-15.059v-48.663c6.852-7.089 11.082-16.729 11.082-27.343 0-21.713-17.665-39.378-39.378-39.378-2.83 0-5.589.307-8.252.877l-56.449-37.319c-6.928-4.58-16.287-2.67-20.865 4.258l-14.602 22.084c-4.578 6.927-2.669 16.288 4.258 20.867zm109.147 105.104h-26.474c-.268 0-.486-.218-.486-.486v-39.101c4.276 1.595 8.898 2.472 13.723 2.472s9.447-.876 13.723-2.472v39.101c0 .268-.218.486-.486.486zm11.568-76.493c0 13.677-11.127 24.805-24.805 24.805-13.677 0-24.805-11.127-24.805-24.805 0-13.677 11.127-24.805 24.805-24.805 13.678.001 24.805 11.128 24.805 24.805zm-112.816-41.441 14.602-22.084c.027-.041.111-.168.307-.208.195-.04.324.044.365.071l48.913 32.337c-7.379 5.625-12.719 13.79-14.702 23.181l-49.348-32.625c-.041-.027-.168-.111-.208-.307-.039-.197.044-.323.071-.365z"
                                />
                                <path d="m230.64 110.954v-26.592c0-4.025-3.262-7.287-7.287-7.287s-7.287 3.262-7.287 7.287v26.592c0 4.025 3.262 7.287 7.287 7.287 4.026 0 7.287-3.262 7.287-7.287z" />
                                <path d="m348.077 242.963c0 4.025 3.262 7.287 7.287 7.287h26.592c4.025 0 7.287-3.262 7.287-7.287s-3.262-7.287-7.287-7.287h-26.592c-4.025.001-7.287 3.263-7.287 7.287z" />
                                <path d="m57.466 242.963c0 4.025 3.262 7.287 7.287 7.287h26.592c4.025 0 7.287-3.262 7.287-7.287s-3.262-7.287-7.287-7.287h-26.593c-4.024.001-7.286 3.263-7.286 7.287z" />
                                <path d="m334.034 315.278 23.028 13.296c3.423 1.993 7.931.85 9.954-2.667 2.012-3.485.818-7.941-2.667-9.954l-23.028-13.296c-3.484-2.011-7.942-.819-9.953 2.667-2.013 3.486-.819 7.942 2.666 9.954z" />
                                <path d="m105.387 183.269c3.424 1.993 7.93.851 9.954-2.667 2.012-3.485.818-7.941-2.667-9.954l-23.029-13.296c-3.487-2.012-7.942-.819-9.954 2.667-2.012 3.485-.818 7.941 2.667 9.954z" />
                                <path
                                    d="m157.356 135.927c1.236 0 2.49-.315 3.637-.977 3.485-2.012 4.679-6.469 2.667-9.954l-13.296-23.029c-2.011-3.486-6.47-4.678-9.954-2.667-3.485 2.012-4.679 6.469-2.667 9.954l13.296 23.029c1.349 2.338 3.799 3.644 6.317 3.644z"
                                />
                                <path
                                    d="m86.008 329.552c1.236 0 2.49-.315 3.637-.977l23.029-13.296c3.485-2.012 4.679-6.469 2.667-9.954-2.011-3.486-6.47-4.677-9.954-2.667l-23.029 13.296c-3.485 2.012-4.679 6.469-2.667 9.954 1.349 2.337 3.799 3.644 6.317 3.644z"
                                />
                                <path d="m357.063 157.352-23.028 13.296c-3.485 2.012-4.679 6.469-2.667 9.954 2.024 3.517 6.53 4.66 9.953 2.667l23.028-13.296c3.485-2.012 4.679-6.469 2.667-9.954-2.013-3.485-6.47-4.678-9.953-2.667z" />
                                <path
                                    d="m151.039 353.644-13.296 23.029c-2.012 3.485-.818 7.941 2.667 9.953 1.148.662 2.4.977 3.637.977 2.518 0 4.968-1.306 6.317-3.644l13.296-23.029c2.012-3.485.818-7.941-2.667-9.954-3.487-2.012-7.943-.818-9.954 2.668z"
                                />
                                <path
                                    d="m289.352 135.927c2.518 0 4.968-1.306 6.317-3.644l13.295-23.029c2.012-3.486.818-7.942-2.667-9.954-3.487-2.012-7.942-.819-9.954 2.667l-13.295 23.029c-2.012 3.486-.818 7.942 2.667 9.954 1.148.662 2.401.977 3.637.977z"
                                />
                                <path
                                    d="m435.27 342.758h-5.432c15.296-30.959 23.339-65.41 23.339-100.386 0-57.88-21.785-112.94-61.34-155.036-2.756-2.933-7.367-3.077-10.3-.321s-3.076 7.367-.321 10.3c37.007 39.383 57.387 90.898 57.387 145.057 0 35.196-8.711 69.801-25.184 100.386h-16.867c18.011-30.358 27.478-64.789 27.478-100.386 0-108.87-88.572-197.442-197.442-197.442s-197.442 88.571-197.442 197.441c0 46.567 16.587 91.81 46.706 127.395 1.441 1.703 3.496 2.579 5.565 2.579 1.663 0 3.335-.566 4.704-1.725 3.071-2.6 3.454-7.197.854-10.269-27.894-32.955-43.256-74.855-43.256-117.979 0-100.834 82.035-182.869 182.869-182.869s182.869 82.035 182.869 182.869c0 35.903-10.392 70.526-30.086 100.386h-128.736c-41.644 0-75.621 33.353-76.679 74.747-23.859-7.206-46.331-19.401-65.451-35.608-3.069-2.602-7.668-2.224-10.269.846-2.602 3.069-2.224 7.668.846 10.269 22.067 18.707 48.276 32.466 76.038 39.983 1.009 5.657 2.619 11.108 4.799 16.267-39.034-8.706-74.505-28.23-103.247-56.973-40.046-40.044-62.099-93.285-62.099-149.917s22.053-109.873 62.099-149.917c40.044-40.046 93.285-62.099 149.917-62.099 48.59 0 94.211 15.911 131.93 46.011 3.145 2.51 7.729 1.996 10.24-1.151 2.51-3.145 1.995-7.73-1.151-10.24-40.327-32.183-89.091-49.194-141.019-49.194-60.525 0-117.425 23.569-160.222 66.366s-66.367 99.699-66.367 160.223 23.569 117.425 66.366 160.222c33.855 33.854 76.457 55.743 123.277 63.377 14.032 18.367 36.146 30.246 60.991 30.246h184.636c15.031 0 29.59-4.347 42.102-12.572 3.362-2.211 4.296-6.729 2.085-10.092-2.211-3.362-6.729-4.295-10.091-2.086-10.127 6.658-21.918 10.177-34.097 10.177h-184.634c-34.273 0-62.157-27.883-62.157-62.157s27.883-62.157 62.157-62.157h184.635c34.273 0 62.157 27.883 62.157 62.157 0 11.361-3.091 22.474-8.94 32.137-2.084 3.443-.983 7.923 2.46 10.007 3.442 2.083 7.922.982 10.007-2.46 7.226-11.939 11.046-25.661 11.046-39.683 0-42.309-34.42-76.729-76.73-76.729z"
                                />
                                <path d="m375.875 386.002-25.484 64.073c-1.488 3.739.338 7.976 4.078 9.463 3.643 1.478 7.978-.301 9.463-4.078l25.484-64.073c1.488-3.739-.338-7.976-4.078-9.463-3.736-1.488-7.976.338-9.463 4.078z" />
                                <path
                                    d="m414.621 459.439c3.596 1.606 7.982-.017 9.603-3.738l28.166-64.073c.991-2.253.776-4.855-.569-6.916s-3.64-3.304-6.102-3.304h-35.249c-4.025 0-7.287 3.262-7.287 7.287s3.262 7.287 7.287 7.287h24.086l-23.675 53.854c-1.617 3.683.056 7.983 3.74 9.603z"
                                />
                                <path
                                    d="m325.488 458.811h.064c3.995 0 7.25-3.221 7.286-7.224.019-2.188.054-6.426.093-11.687 4.335.416 8.271-2.853 8.243-7.287 0-4.025-3.262-7.287-7.287-7.287h-.859c.089-15.352.135-31.759-.056-34.041-.428-5.136-3.516-9.325-7.868-10.673-4.321-1.34-8.913.332-12.283 4.469-3.647 4.474-20.478 34.818-25.55 44.011-1.245 2.257-1.205 5.005.106 7.225 1.31 2.219 3.696 3.582 6.274 3.582h24.705c-.029 4.092-.062 8.017-.092 11.562-.034 4.024 3.199 7.315 7.224 7.35zm-19.455-33.484c4.613-8.25 9.109-16.161 12.502-21.968-.004 6.003-.036 13.84-.083 21.968z"
                                />
                                <path
                                    d="m261.102 416.984c-10.149 14.5-16.205 22.43-19.458 26.691-4.019 5.262-5.853 7.663-4.612 11.701.73 2.373 2.526 4.193 4.934 4.995 3.843 1.126 23.953.49 35.043.472 4.024-.05 7.245-3.353 7.194-7.378-.05-4.024-3.337-7.284-7.378-7.194-6.455.081-13.305.134-18.978.145 3.557-4.757 8.506-11.517 15.195-21.077 5.016-7.464 7.946-13.109 8.446-20.566 0-13.058-10.623-23.681-23.682-23.681-11.29 0-21.063 8.032-23.237 19.1-.776 3.949 1.797 7.778 5.746 8.554 3.943.779 7.779-1.797 8.554-5.746.835-4.25 4.594-7.335 8.937-7.335 4.89 0 8.892 3.872 9.101 8.712-.508 4.287-2.523 7.697-5.805 12.607z"
                                />
                            </g>
                        </svg>
                    </div>
                    <div class="inf">
                        <h6>Personalized Service</h6>
                    </div>
                </div>
            </div>

            <div class="desc">
                <p>
                    At Luxury Homez, we understand that luxury is not just a price tag—it’s an experience. We go beyond listings to offer white-glove service, in-depth insights, and unmatched professionalism. As we continue to grow and
                    adapt in an ever-evolving market, our core mission remains the same—to connect you with exceptional residences that match your aspirations.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Main div -->

<!-- DEVELOPERS -->
<section>
    <div class="home-secA sec-pad ar-abouts-pd">
        <div class="container over_hidden">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                   @php
                        $headingParts = explode('||', $global_settings->home_sec1_heading);
                    @endphp
                    <h2>
                        {{ $headingParts[0] ?? '' }}
                        @if(isset($headingParts[1]))
                            <span>{{ $headingParts[1] }}</span>
                        @endif
                    </h2>
                    <div class="line"></div>
                </div>
                 <p>{!!  $global_settings->home_sec1_paragraph !!}</p>
            </div>
            <div class="client_wrapper">
                <div class="client_slider swiper">
                    <div class="swiper-wrapper">
                        @foreach($builders as $builder)
                         <a class="swiper-slide item" href="{{ url('developer/' . $builder->slug) }}">
                            <img src="{{ url('storage/app/public/' . $builder->logo) }}" alt="{{ $builder->name }}" />
                        </a>
                       @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- DEVELOPERS -->

@push('scripts')
 <script type="text/javascript" src="{{url('')}}/frontend_assets/js/about.js"></script>
@endpush 
@stop
