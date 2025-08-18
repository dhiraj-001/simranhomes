<form action="{{ route('search.properties') }}" method="GET">
    <div class="search-div text-center">
        <select name="city">
            <option value="">Select City</option>
            @foreach ($cities as $id => $city_name)
                <option value="{{ $city_name }}">{{ $city_name }}</option>
            @endforeach
        </select>

        <input type="text" name="developer" placeholder="Type Developer name to start search" />

        <button class="ar-animated-bg" type="submit">
            <img src="{{ Vite::asset('frontend_assets/icon/search.svg') }}" alt="Search" />
        </button>
    </div>
</form>


