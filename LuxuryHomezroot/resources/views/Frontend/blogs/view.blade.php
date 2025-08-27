@extends('layouts.master') 
@section('title', $blog->heading) 
@section('keywords', $blog->meta_keywords) 
@section('description', $blog->meta_description) 

@section('content') 

@push('styles')
@vite([
    'frontend_assets/css/blogs.css',
    'frontend_assets/css/developers.css',
    'frontend_assets/css/hoztab.css',
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/aresponsive.css'
])
<style>
    /* Additional styles for blog content */
    .prose h5, .prose h6 {
        scroll-margin-top: 80px; /* Offset for sticky header when jumping to anchors */
    }
</style>
@endpush

<!-- =================================================================================== -->
<!-- START: BLOG HERO SECTION (REDESIGNED)                                             -->
<!-- =================================================================================== -->
<div class="relative h-[70vh] min-h-[500px] flex items-center justify-center text-center text-white overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0 bg-navy-dark">
        <img src="{{ asset('storage/' . $blog->main_image) }}" alt="{{ $blog->heading }}" class="w-full h-full object-cover" />
        <!-- Darkening overlay -->
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6" data-animate="fade-up">
        <h1 class="font-display text-4xl md:text-6xl font-bold mb-4 leading-tight">
            {{ $blog->heading }}
        </h1>
        <p class="font-elegant text-lg text-gray-300">
            Posted on: {{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}
        </p>
    </div>
</div>
<!-- =================================================================================== -->
<!-- END: BLOG HERO SECTION                                                            -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: BLOG CONTENT SECTION (REDESIGNED)                                          -->
<!-- =================================================================================== -->
<section class="bg-white py-20 sm:py-28">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

            <!-- Main Blog Content (Left Column) -->
            <div class="lg:col-span-8">
                <!-- Table of Contents -->
                <div class="bg-gray-50 rounded-2xl p-6 mb-8 border border-gray-200" data-animate="fade-up">
                    <h4 class="font-display text-xl text-navy-dark font-bold mb-4">Table of Contents</h4>
                    <ol id="generated-toc" class="space-y-2 list-decimal list-inside text-gray-600 font-elegant"></ol>
                </div>

                <!-- Blog Body -->
                <div class="prose max-w-none prose-h5:font-display prose-h5:text-navy-dark prose-h6:font-display prose-h6:text-navy-dark font-elegant text-gray-700" data-animate="fade-up" data-animate-delay="100">
                    {!! $blog->full_content !!}
                </div>

                <!-- Share Section -->
                <div class="mt-12 pt-8 border-t" data-animate="fade-up">
                    <h5 class="font-display text-lg text-navy-dark font-bold mb-4">Share This Article</h5>
                    <div class="flex items-center gap-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank" class="text-gray-500 hover:text-gold-accent transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v2.385z"/></svg></a>
                        <a href="https://twitter.com/intent/tweet?url={{url()->current()}}" target="_blank" class="text-gray-500 hover:text-gold-accent transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616v.064c0 2.297 1.634 4.209 3.807 4.649-.63.172-1.296.22-1.994.145.621 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}" target="_blank" class="text-gray-500 hover:text-gold-accent transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg></a>
                        <a href="https://api.whatsapp.com/send?text={{url()->current()}}" target="_blank" class="text-gray-500 hover:text-gold-accent transition-colors"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 4.315 1.847 6.062l-1.011 3.697 3.717-1.005z"/></svg></a>
                    </div>
                </div>
            </div>

            <!-- Sidebar (Right Column) -->
            <div class="lg:col-span-4">
                <div class="sticky top-28">
                    <!-- Contact Form -->
                    <div class="bg-navy-dark text-white rounded-2xl p-8 mb-8" data-animate="fade-up">
                        <h3 class="font-display text-navy text-2xl font-bold mb-4">Get In Touch!</h3>
                        <form class="space-y-4" action="{{ route('enquiry.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="blog">
                            <input type="hidden" name="page_url" value="{{ url()->current() }}">
                            <input type="text" placeholder="Your Name" name="name" required class="w-full border-navy/20 border-1 bg-white/10 p-3 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-gold-accent" />
                            <input type="email" name="email" placeholder="Your Email" required class="w-full border-navy/20 border-1 bg-white/10 p-3 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-gold-accent" />
                            <input type="text" name="mobile" placeholder="Mobile Number" required class="w-full border-navy/20 border-1 bg-white/10 p-3 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-gold-accent" />
                            <textarea name="message" placeholder="Your Message" rows="4" class="w-full border-navy/20 border-1 bg-white/10 p-3 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-gold-accent"></textarea>
                            <button type="submit" class="w-full bg-gold-accent bg-navy font-bold py-3 rounded-md hover:bg-white transition-colors duration-300 font-display">Submit</button>
                        </form>
                    </div>

                    <!-- Recent Posts -->
                    <div data-animate="fade-up" data-animate-delay="100">
                        <h4 class="font-display text-2xl text-navy-dark font-bold mb-4">Recent Posts</h4>
                        <div class="space-y-4">
                            @foreach($blogs->take(3) as $recentBlog)
                                @if($recentBlog->status == 1 && $recentBlog->id != $blog->id)
                                <a href="{{ url('blog/' . $recentBlog->slug) }}" class="group flex items-center gap-4">
                                    <img src="{{ asset('storage/' . $recentBlog->main_image) }}" alt="{{ $recentBlog->heading }}" class="w-24 h-24 object-cover rounded-lg flex-shrink-0" />
                                    <div>
                                        <p class="font-elegant text-xs text-gray-500 mb-1">{{ $recentBlog->created_at->format('d M, Y') }}</p>
                                        <h5 class="font-display text-sm font-bold text-navy-dark group-hover:text-gold-accent transition-colors line-clamp-2">{{ $recentBlog->heading }}</h5>
                                    </div>
                                </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: BLOG CONTENT SECTION                                                         -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: TRENDING PROJECTS SECTION                                                  -->
<!-- =================================================================================== -->
<section class="bg-gray-50 py-20 sm:py-28">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
<!-- =================================================================================== -->
<!-- END: TRENDING PROJECTS SECTION                                                    -->
<!-- =================================================================================== -->


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Table of Contents Auto-generation
    const contentArea = document.querySelector(".blog-body-content");
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
                
                // Smooth scroll
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
            // Hide TOC if no headings are found
            tocList.parentElement.style.display = 'none';
        }
    }
});
</script>
@endpush 

@stop
