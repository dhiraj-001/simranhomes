@extends('layouts.master') 
@section('title','Blogs | Luxury Homez') 
@section('description','A refined collection of articles and insights crafted to empower luxury home buyers, sellers, and investors.') 

@section('content')

@push('styles')
@vite([
    'frontend_assets/sass/home/home.css',
    'frontend_assets/css/developers.css',
    'frontend_assets/css/hoztab.css',
    'frontend_assets/css/allprojects.css',
    'frontend_assets/css/aresponsive.css'
])
<style>
    /* Custom styles for Laravel's default pagination */
    .pagination nav {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
    }
    .pagination .page-item .page-link {
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        color: #0A2342; /* navy-dark */
    }
    .pagination .page-item.active .page-link {
        background-color: #0A2342; /* navy-dark */
        color: white;
        border-color: #0A2342;
    }
    .pagination .page-item:not(.disabled) .page-link:hover {
        background-color: #f0f0f0;
    }
    .pagination .page-item.disabled .page-link {
        color: #9ca3af;
    }
</style>
@endpush

<!-- =================================================================================== -->
<!-- START: HERO BANNER SECTION (REDESIGNED)                                           -->
<!-- =================================================================================== -->
<div class="relative px-5 h-[60vh] min-h-[500px] flex items-center justify-center text-center text-white overflow-hidden">
    <!-- Background Media -->
    <div class="absolute inset-0 z-0 bg-navy-dark">
        @if($banner && $banner->type === 'image' && $banner->images->count())
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $banner->images->first()->image) }}');"></div>
        @else
            {{-- Fallback background --}}
            <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?q=80&w=2070');"></div>
        @endif
        <!-- Darkening overlay -->
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-6" data-animate="fade-up">
        @php $headingParts = explode('||', $global_settings->home_sec9_heading); @endphp
        <p class="font-display text-gold-accent font-semibold tracking-widest uppercase mb-4">{{ $headingParts[0] ?? 'Insights' }}</p>
        <h1 class="font-display text-5xl md:text-7xl font-bold mb-6 leading-tight">
            {{ $headingParts[1] ?? 'From The Journal' }}
        </h1>
        <div class="max-w-3xl mx-auto text-base text-gray-300 font-elegant">
            <p>A refined collection of articles and insights crafted to empower luxury home buyers, sellers, and investors.</p>
        </div>
    </div>
</div>
<!-- =================================================================================== -->
<!-- END: HERO BANNER SECTION                                                          -->
<!-- =================================================================================== -->


<!-- =================================================================================== -->
<!-- START: BLOGS SECTION (REDESIGNED)                                                 -->
<!-- =================================================================================== -->
<section class="bg-gray-50 py-20 sm:py-28 px-5">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto">
            
            <!-- Blog Posts Grid -->
            <div class="grid grid-cols-1 gap-12">
                @foreach($blogs as $blog)
                    @if($blog->status == 1)
                        {{-- FEATURED POST (The first one in the collection) --}}
                        @if($loop->first)
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center mb-12" data-animate="fade-up">
                            <a href="{{ url('blog/' . $blog->slug) }}" class="group block relative rounded-2xl shadow-xl hover:shadow-2xl overflow-hidden transition-all duration-300">
                                <img src="{{ asset('storage/' . $blog->main_image) }}" alt="{{ $blog->heading }}" class="w-full h-96 object-cover group-hover:scale-105 transition-transform duration-300" />
                            </a>
                            <div class="flex flex-col justify-center">
                                <p class="font-elegant text-sm text-gray-500 mb-2">{{ $blog->created_at->format('d M, Y') }}</p>
                                <h3 class="font-display text-3xl md:text-4xl text-navy-dark font-bold mb-4">
                                    <a href="{{ url('blog/' . $blog->slug) }}" class="hover:text-gold-accent transition-colors">{{ $blog->heading }}</a>
                                </h3>
                                <div class="prose max-w-none text-gray-600 font-elegant text-sm line-clamp-3 mb-6">
                                    {!! $blog->short_content !!}
                                </div>
                                <a href="{{ url('blog/' . $blog->slug) }}" class="inline-block font-display text-navy-dark font-bold group/link">
                                    Read More <span class="inline-block transition-transform duration-300 group-hover/link:translate-x-1">&rarr;</span>
                                </a>
                            </div>
                        </div>
                        {{-- Start the grid for the rest of the posts --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @else
                        {{-- REGULAR POST CARD --}}
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl overflow-hidden group flex flex-col transition-all duration-300 hover:-translate-y-2" data-animate="fade-up" data-animate-delay="{{ ($loop->index - 1) * 100 }}">
                            <a href="{{ url('blog/' . $blog->slug) }}" class="block relative">
                                <img src="{{ asset('storage/' . $blog->main_image) }}" alt="{{ $blog->heading }}" class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-300" />
                            </a>
                            <div class="p-6 flex flex-col flex-grow">
                                <p class="font-elegant text-sm text-gray-500 mb-2">{{ $blog->created_at->format('d M, Y') }}</p>
                                <h3 class="font-display text-xl text-navy-dark font-bold mb-3 flex-grow">
                                    <a href="{{ url('blog/' . $blog->slug) }}" class="hover:text-gold-accent transition-colors line-clamp-2">{{ $blog->heading }}</a>
                                </h3>
                                <div class="mt-auto pt-4 border-t border-gray-100">
                                     <a href="{{ url('blog/' . $blog->slug) }}" class="font-display text-sm text-navy-dark font-bold group/link">
                                        Read More <span class="inline-block transition-transform duration-300 group-hover/link:translate-x-1">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                @endforeach
                </div> {{-- Close the inner grid --}}
            </div>

            <!-- Pagination -->
            <div class="mt-20 pagination" data-animate="fade-up">
                 {{ $blogs->links() }}
            </div>
        </div>
    </div>
</section>
<!-- =================================================================================== -->
<!-- END: BLOGS SECTION                                                                -->
<!-- =================================================================================== -->

@push('scripts')
{{-- Main JS for sliders etc. should be handled in your master layout or a dedicated script file --}}
@endpush 
@stop
