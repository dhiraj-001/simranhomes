@extends('layouts.master') @section('title','Blogs : Luxury Homez') @section('description','Luxury Homez') @section('content') @push('styles')
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
                <p>A refined collection of articles and insights crafted to empower luxury home buyers, sellers, and investors.</p>
            </div>
            <div class="blogs_wrapper">
                @foreach($blogs as $blog) @if($blog->status == 1)
                <div class="blogs_col ar-blogsc_col">
                    @php $blogUrl = url('blog/' . $blog->slug); @endphp

                    <a href="{{ $blogUrl }}" class="figure" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('storage/app/public/' . $blog->main_image) }}" alt="{{ $blog->heading }}" />
                    </a>

                    <figcaption>
                        <h5>{{ $blog->heading }}</h5>
                        <p>{!! $blog->short_content !!}</p>

                        <div class="btn_wrapper">
                            <a href="{{ $blogUrl }}" class="readMore" target="_blank" rel="noopener noreferrer">
                                Read More
                                <img src="{{ asset('frontend_assets/icon/right-arrow.svg') }}" class="svg" alt="" />
                            </a>

                            <span class="social_toggle">
                                <a href="javascript:;" class="shareBtn">
                                    Share Now
                                    <img src="{{ asset('frontend_assets/icon/blogshare.svg') }}" class="ar-share-icon" alt="" />
                                </a>

                                <ul class="social">
                                    <li>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($blogUrl) }}" target="_blank">
                                            <img src="{{ asset('frontend_assets/images/home/bfacebook.png') }}" class="ar-social-icon" alt="Facebook" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode($blogUrl) }}" target="_blank">
                                            <img src="{{ asset('frontend_assets/images/home/btwitter.png') }}" class="ar-social-icon" alt="Twitter" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($blogUrl) }}" target="_blank">
                                            <img src="{{ asset('frontend_assets/images/home/blinkedin.png') }}" class="ar-social-icon" alt="LinkedIn" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://api.whatsapp.com/send?text={{ urlencode($blogUrl) }}" target="_blank">
                                            <img src="{{ asset('frontend_assets/images/home/bwhatsapp.png') }}" class="ar-social-icon" alt="WhatsApp" />
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:?subject=Check this out&body={{ urlencode($blogUrl) }}">
                                            <img src="{{ asset('frontend_assets/images/home/bemail.png') }}" class="ar-social-icon" alt="Email" />
                                        </a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </figcaption>

                    <time>{{ $blog->created_at->format('d-M-Y') }}</time>
                </div>
                @endif @endforeach
            </div>

            <div class="btn_wrapper text-center" data-animate="fade-up">
                <!--<div class="btn btn-btn border-black">-->
                <!--    Load More-->
                <!--    <img src="{{url('')}}/frontend_assets/icon/right-arrow.svg" alt="" class="svg" />-->
                <!--</div>-->
                 {{ $blogs->links() }}
            </div>
        </div>
    </div>
</section>

@push('scripts') @endpush @stop
