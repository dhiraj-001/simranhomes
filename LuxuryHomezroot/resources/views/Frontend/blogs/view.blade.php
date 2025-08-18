@extends('layouts.master') @section('title', $blog-> heading) @section('keywords', $blog-> meta_keywords) @section('description',$blog-> meta_description) @section('content') @push('styles')
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/blogs.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/developers.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/hoztab.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/allprojects.css" />
<link rel="stylesheet" href="{{url('')}}/frontend_assets/css/aresponsive.css" />
@endpush

<div class="banner home-banner">
    <div class="banner-wrapper">
        <div class="container">
            <div class="content content-white text-center">
               <x-search-bar />
            </div>
        </div>
    </div>
</div>

<!-- blogs content -->
<section>
    <div class="banner blog-detail-banner">
        <div class="bg">
            <img
                src="{{ asset('storage/app/public/' . $blog->breadcrumbs_image) }}"
                alt="{{ $blog->heading }}"
                title="{{ $blog->heading }}"
            />
        </div>
        <div class="banner-content">
            <div class="content">
                <h1>{{ $blog->heading }}</h1>
                <p>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</p>
            </div>
        </div>
    </div>
</section>
<!-- blogs content -->

<!-- Blog New section -->
<section class="sec-pad">
    <div class="container ar-blogs-section">
        <div class="ar-blogs-left">
            <div class="ar-blogs-left-title-div">
               @php
                $words = explode(' ', $blog->heading);
            
                // Wrap 3rd and 4th word in span (array index starts from 0)
                if (count($words) >= 4) {
                    $words[2] = '<span>' . $words[2];       // 3rd word
                    $words[3] = $words[3] . '</span>';       // 4th word
                }
                $highlightedHeading = implode(' ', $words);
                @endphp

                <h1>{!! $highlightedHeading !!}</h1>
                <h6><span>Posted on:</span> {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</h6>
            </div>
            <div class="ar-blogs-social-div">
                <span class="social_toggle">
                    <a href="javascript:;" class="shareBtn">Share Blog <img src="{{url('')}}/frontend_assets/icon/blogshare.svg" class="ar-share-icon" alt="" /></a>
                    <ul class="social">
                    <li style="list-style-type: none !important;">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank">
                            <img src="{{ url('') }}/frontend_assets/images/home/bfacebook.png" class="ar-social-icon" alt="Facebook" />
                        </a>
                    </li>
                
                    <li style="list-style-type: none !important;">
                        <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" target="_blank">
                            <img src="{{ url('') }}/frontend_assets/images/home/btwitter.png" class="ar-social-icon" alt="Twitter" />
                        </a>
                    </li>
                
                    <li style="list-style-type: none !important;">
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}" target="_blank">
                            <img src="{{ url('') }}/frontend_assets/images/home/blinkedin.png" class="ar-social-icon" alt="LinkedIn" />
                        </a>
                    </li>
                
                    <li style="list-style-type: none !important;">
                        <a href="https://api.whatsapp.com/send?text={{url()->current()}}" target="_blank">
                            <img src="{{ url('') }}/frontend_assets/images/home/bwhatsapp.png" class="ar-social-icon" alt="WhatsApp" />
                        </a>
                    </li>
                
                    <li style="list-style-type: none !important;">
                        <a href="mailto:?subject=Check this out&body={{url()->current()}}">
                            <img src="{{ url('') }}/frontend_assets/images/home/bemail.png" class="ar-social-icon" alt="Email" />
                        </a>
                    </li>
                </ul>

                </span>
            </div>
            <img src="{{ asset('storage/app/public/' . $blog->main_image) }}" alt="" />
            <!-- table of contents -->
            <div class="ar-blog-toc-container open" id="ar-blog-toc">
                <div class="ar-blog-toc-header" onclick="toggleToc()">
                    Table of Content
                    <svg class="ar-blog-toc-arrow" id="ar-blog-toc-arrow" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
                <div class="ar-blog-toc-content">
                    <ol id="generated-toc"></ol>
                </div>
            </div>
            <!-- table of content -->
            <div class="blog-body-content">
         {!! $blog->full_content !!}
         </div>
        </div>

        <!-- Right Column (Form + Recent Posts) -->
        <div class="ar-blogs-right">
            <div class="ar-blogs-sticky">
                <!-- Sticky Form Section -->
                <div class="ar-blogs-form-wrapper" id="stickyForm">
                    <h3>Get in touch with us!</h3>
                    
                    <form class="ar-blogs-form" action="{{ route('enquiry.store') }}" method="post">
                        @csrf
                    <!-- Hidden field for enquiry type -->
                    <input type="hidden" name="type" value="blog">

                    <!-- Hidden field for current page URL -->
                    <input type="hidden" name="page_url" value="{{ url()->current() }}">
                        <input type="text" placeholder="Your Name" name="name" required />
                        <div class="ar-blogs-form-selectdiv">
                            <select class="ar-selectcode" name="countryCode" required style="">
                                <option value="+1">+1 (USA)</option>
                                <option value="+44">+44 (UK)</option>
                                <option value="+91" selected>+91 (India)</option>
                                <option value="+61">+61 (Australia)</option>
                                <option value="+81">+81 (Japan)</option>
                                <option value="+971">+971 (UAE)</option>
                                <option value="+49">+49 (Germany)</option>
                                <option value="+33">+33 (France)</option>
                                <option value="+86">+86 (China)</option>
                                <option value="+55">+55 (Brazil)</option>
                                <option value="+7">+7 (Russia)</option>
                                <option value="+27">+27 (South Africa)</option>
                                <option value="+34">+34 (Spain)</option>
                                <option value="+39">+39 (Italy)</option>
                                <option value="+82">+82 (South Korea)</option>
                                <option value="+880">+880 (Bangladesh)</option>
                                <option value="+234">+234 (Nigeria)</option>
                                <option value="+62">+62 (Indonesia)</option>
                                <option value="+351">+351 (Portugal)</option>
                                <option value="+90">+90 (Turkey)</option>
                            </select>

                            <input type="text" name="mobile" placeholder="Enter valid mobile no." required style="flex: 1;" />
                        </div>
                        <input type="email" name="email" placeholder="Your Email" required />
                        <textarea name="message" placeholder="Your Message" rows="4"></textarea>
                        <button type="submit">Submit</button>
                    </form>
                    
                </div>

                <!-- Recent Posts Section -->
                <div class="ar-blogs-recent-posts" id="belowSection">
                    <h4>Recent Posts</h4>
                    @foreach($blogs as $blog)
                    @if($blog->status == 1)
                    <div class="ar-blogs-post-item">
                        <img src="{{ asset('storage/app/public/' . $blog->main_image) }}" alt="{{ $blog->heading }}" />
                        <div class="ar-blogs-post-info ar-post-ellipsis-container">
                            <h5 class="ar-post-ellipsis-heading">{{ $blog->heading }}</h5>
                            <span>{{ $blog->created_at->format('d-M-Y') }}</span><br />
                            <a href="{{ url('blog/' . $blog->slug) }}">Read More</a>
                        </div>
                    </div>
                     @endif
                    @endforeach
                 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog New Section -->

<!-- trending Projects -->
<section>
    <div class="home-secD sec-pad gray-bg">
        <div class="container over_hidden">
            <div class="heading">
                <div class="heading_wrapper">
                    <div class="line"></div>
                    <h2>Trending <span>Projects</span></h2>
                    <div class="line"></div>
                </div>
                <p>Browse our most sought-after listings loved by clients and investors alike. Each one is a symbol of class, comfort, and lifestyle.</p>
            </div>
            <div class="property_listing">
                <div class="prolisting_slider swiper">
                    <div class="swiper-wrapper">
                        
        @foreach($trendingProperties as $item)
        <div class="swiper-slide">
            <div class="prop_col">
                <a href="{{ url('property/' . $item->slug) }}"><figure>
                    <img src="{{ asset('storage/app/public/' . $item->main_image) }}" class="prop_img" alt="{{ $item->heading }}" />
                    <a href="{{ url('property/' . $item->slug) }}" class="exp_pro" target="_blank" rel="noopener noreferrer"> 
                        Explore projects <img src="{{ url('frontend_assets/icon/top-right.svg') }}" alt="" />
                    </a>
                    @if($item->is_featured)
                        <span class="stick">featured</span>
                    @endif
                </figure></a>
                <figcaption>
                    <a href="{{ url('property/' . $item->slug) }}" target="_blank" rel="noopener noreferrer"> 
                        <h6>{{ $item->heading }}</h6>
                    </a>
                    <p class="ar-pt">By {{ optional($item->builder)->name ?? 'N/A' }}</p>
                    <ul class="details">
                        <li class="loc">
                            <img class="arsvg ar-smooth-blink" src="{{ url('frontend_assets/icon/mappin1.svg') }}" alt="" />
                            <p>{{$item->location}}</p>
                        </li>
                        <li>
                            <img class="svg" src="{{ url('frontend_assets/icon/rupee.svg') }}" alt="" />
                            <p>{{ $item->price ?? 'On Request*' }}</p>
                        </li>
                        <li>
                            <img class="svg" src="{{ url('frontend_assets/icon/hotel.svg') }}" alt="" />
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
<!-- trending Projects -->

<!-- faq -->
<section class="sec-pad ar-key-pd gray-bg">
    <div class="container">
        <div class="ar-faqs-card">
            <div class="ar-faqs-header">
                <h2 class="ar-heading">Frequently <span>Asked Questions</span></h2>
            </div>
            <div class="ar-faqs-body">
                <div class="ar-faq-container">
                    <div class="ar-faq-accordion">
                        @foreach($faqs as $index => $faq)
                        <div class="ar-faq-item">
                            <input class="ar-faq-hidden" type="checkbox" id="ar-faq-q{{ $index }}" />
                            <label class="ar-faq-question" for="ar-faq-q{{ $index }}">
                                {{ $index + 1 }}. {{ $faq->question }}
                            </label>
                            <div class="ar-faq-answer">
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                        @endforeach

                        @if($faqs->isEmpty())
                            <p>No FAQs available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- faq -->

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Table of Contents Auto-generation
    const contentArea = document.querySelector(".blog-body-content");
    const tocList = document.getElementById("generated-toc");

    if (!contentArea || !tocList) return;

    const headings = contentArea.querySelectorAll("h5, h6");
    headings.forEach((heading, index) => {
        const id = `heading-anchor-${index}`;
        heading.setAttribute("id", id);

        const li = document.createElement("li");
        const a = document.createElement("a");
        a.href = `#${id}`;
        a.textContent = heading.textContent;

        li.appendChild(a);
        tocList.appendChild(li);
    });

    // Table of Contents Highlight on Click
    document.querySelectorAll('.ar-blog-toc-content a').forEach(link => {
        link.addEventListener('click', function () {
            const targetId = this.getAttribute('href').substring(1);
            const targetEl = document.getElementById(targetId);

            if (targetEl) {
                setTimeout(() => {
                    targetEl.classList.add('ar-blog-toc-highlight');
                    setTimeout(() => {
                        targetEl.classList.remove('ar-blog-toc-highlight');
                    }, 1000);
                }, 100);
            }
        });
    });

    // Force a hover on Share Icon
    const share = document.querySelector('.ar-social-icon-share');
    if (share) {
        setTimeout(() => {
            share.classList.add("hover");
        }, 1000);
        setTimeout(() => {
            share.classList.remove("hover");
        }, 3000);
    }

    // Ellipsis Headings
    const wordLimit = 6;
    const headingsEllipsis = document.querySelectorAll('.ar-post-ellipsis-heading');
    headingsEllipsis.forEach(heading => {
        const fullText = heading.textContent.trim();
        const words = fullText.split(/\s+/);
        if (words.length > wordLimit) {
            const truncatedText = words.slice(0, wordLimit).join(" ") + "…";
            heading.textContent = truncatedText;
        }
        heading.setAttribute("title", fullText);
    });
});

// Toggle Table of Contents Panel
function toggleToc() {
    const toc = document.getElementById("ar-blog-toc");
    const arrow = document.getElementById("ar-blog-toc-arrow");
    toc.classList.toggle("open");

    if (arrow) {
        arrow.style.transform = toc.classList.contains("open") ? "rotate(0deg)" : "rotate(-90deg)";
    }
}
</script>
@endpush

@stop
