<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\City;
use App\Models\Setting;
use App\Models\KeywordSection;
use App\Models\Keyword;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Use a closure-based composer to share services and product categories across all views  
           View::share('cities', City::pluck('city_name', 'id'));
           
           // Share global settings with all views
        View::share('global_settings', Setting::first());

        // Share all_states with all views
       
        
        // ✅ Share active keyword sections with all views
    View::share('keyword_sections', KeywordSection::with(['keywords' => function($query) {
        $query->whereHas('properties'); // optional: only keywords with properties
    }])->where('status', 1)->get());
    
    
    }
    
    
}