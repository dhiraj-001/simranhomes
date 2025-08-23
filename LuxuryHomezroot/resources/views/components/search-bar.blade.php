{{-- 
    This component provides a modern, responsive search bar.
    It expects a `$cities` variable to be passed from the parent view.
--}}

@props(['cities' => []])

<form action="{{ route('search.properties') }}" method="GET" class="w-full">
    <div class="flex items-center bg-white/20 backdrop-blur-sm rounded-full shadow-lg p-2 w-full max-w-3xl mx-auto transition-all duration-300 focus-within:bg-white/30">
        
        <!-- City Select Field -->
        <div class="relative flex items-center w-full md:w-1/3 px-2">
            <!-- Location Icon -->
            <svg class="w-6 h-6 text-white/70 mr-2 flex-shrink-0 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            
            <select name="city" class="bg-transparent w-full text-white font-sans text-lg appearance-none focus:outline-none cursor-pointer pr-8">
                <option value="" class="text-gray-500">Select City</option>
                @foreach ($cities as $id => $city_name)
                    {{-- The text-black class ensures options are readable on the default white dropdown --}}
                    <option value="{{ $city_name }}" class="text-black font-sans">{{ $city_name }}</option>
                @endforeach
            </select>

            <!-- IMPROVEMENT: Custom Dropdown Arrow -->
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white/70">
                <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>

        <!-- Divider -->
        <div class="h-8 w-px bg-white/20 hidden md:block"></div>

        <!-- Developer Input Field -->
        <div class="hidden md:flex items-center w-full md:w-2/3 px-2">
            <!-- Building Icon -->
            <svg class="w-6 h-6 text-white/70 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            
            <input 
                type="text" 
                name="developer" 
                placeholder="Search by Developer..." 
                class="bg-transparent w-full text-white text-lg placeholder-white/70 focus:outline-none font-sans"
            />
        </div>

        <!-- Submit Button -->
        <button class="bg-gold-accent text-navy-dark rounded-full p-3 hover:bg-yellow-500 transition duration-300 ml-2 flex-shrink-0" type="submit" aria-label="Search">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </button>

    </div>
</form>
