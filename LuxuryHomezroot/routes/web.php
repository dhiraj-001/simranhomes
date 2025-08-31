<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\PlocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\PropertySubTypeController;
use App\Http\Controllers\HomeStatisticController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermsController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main Page Root
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', [AboutusController::class, 'aboutPage'])->name('about');

Route::get('/contact-us', [ContactusController::class, 'conatctPage'])->name('contact');

Route::get('/privacy-policy', [PrivacyController::class, 'privacyPage'])->name('privacy');

Route::get('/terms-condition', [TermsController::class, 'termsPage'])->name('terms');






//Enquiry
Route::post('/contact-us', [EnquiryController::class, 'store'])->name('enquiry.store');



Route::get('/thank-you', function () {
    return view('Frontend.thank-you');
})->name('thank-you');



Route::get('/404', function () {
    return view('Frontend.404');
});




Route::get('/properties/builder/{slug}', [PropertyController::class, 'builderProperties'])->name('properties.builder');


//Properties
// Filter Properties by property_type
Route::get('/properties/{propertyType}', [PropertyController::class, 'filterProperties'])->name('property.by.type');

// Search
Route::post('/filter-properties', [PropertyController::class, 'propertySearch'])->name('propertySearch');


// All Properties Page (Paginated)
Route::get('/properties', [PropertyController::class, 'propertyPage'])->name('property.page');

// All Locations
Route::get('/locations', [CityController::class, 'locationPage'])->name('location.page');




Route::get('/property/{slug}', [PropertyController::class, 'property']);

//Blogs
Route::get('/blogs', [BlogController::class, 'blogPage'])->name('blog.page');

Route::get('/blog/{slug}', [BlogController::class, 'blog']);

//Builder Detail
Route::get('/developer/{slug}', [BuilderController::class, 'developer']);
Route::get('/developers', [BuilderController::class, 'showBuildersTab'])->name('developers.tab');


//Admin Route
Route::middleware('auth')->group(function () {
    Route::get('admin/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('admin/profile', [AdminProfileController::class, 'update'])->name('profile.partials.update');
});


// Admin Page Root
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('Admin.dashboard');
    Route::resource('admin/pages', PageController::class, ['as' => 'admin']);
});




// Properties routes
Route::middleware('auth')->group(function () {
    Route::get('admin/properties', [PropertyController::class, 'index'])->name('Admin.properties.index');
    Route::get('admin/property/create', [PropertyController::class, 'create'])->name('Admin.properties.create');
    Route::post('admin/property', [PropertyController::class, 'store'])->name('Admin.properties.store');
    Route::get('admin/property/{id}/edit', [PropertyController::class, 'edit'])->name('Admin.properties.edit');
    Route::put('admin/property/{id}', [PropertyController::class, 'update'])->name('Admin.properties.update');
    Route::delete('admin/property/{id}', [PropertyController::class, 'destroy'])->name('Admin.properties.destroy');
    Route::post('admin/properties/update-order', [PropertyController::class, 'updateOrder'])->name('Admin.properties.updateOrder');
});




// Blogs routes
Route::middleware('auth')->group(function () {
    Route::get('admin/blogs', [BlogController::class, 'index'])->name('Admin.blogs.index');
    Route::get('admin/blog/create', [BlogController::class, 'create'])->name('Admin.blogs.create');
    Route::post('admin/blog', [BlogController::class, 'store'])->name('Admin.blogs.store');
    Route::get('admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('Admin.blogs.edit');
    Route::put('admin/blog/{id}', [BlogController::class, 'update'])->name('Admin.blogs.update');
    Route::delete('admin/blog/{id}', [BlogController::class, 'destroy'])->name('Admin.blogs.destroy');
});



// Banner Routes
Route::middleware('auth')->group(function () {
    Route::get('admin/banners', [BannerController::class, 'index'])->name('Admin.banners.index');
    Route::get('admin/banner/create', [BannerController::class, 'create'])->name('Admin.banners.create');
    Route::post('admin/banner', [BannerController::class, 'store'])->name('Admin.banners.store');
    Route::get('admin/banner/{id}/edit', [BannerController::class, 'edit'])->name('Admin.banners.edit');
    Route::put('admin/banner/{id}', [BannerController::class, 'update'])->name('Admin.banners.update');
    Route::delete('admin/banner/{id}', [BannerController::class, 'destroy'])->name('Admin.banners.destroy');
});


 // Keywords
Route::middleware('auth')->group(function () {
    Route::get('admin/keywords', [KeywordController::class, 'index'])->name('Admin.keywords.index');
    Route::get('admin/keyword/create', [KeywordController::class, 'create'])->name('Admin.keywords.create');
    Route::post('admin/keyword', [KeywordController::class, 'store'])->name('Admin.keywords.store');
    Route::get('admin/keyword/{id}/edit', [KeywordController::class, 'edit'])->name('Admin.keywords.edit');
    Route::put('admin/keyword/{id}', [KeywordController::class, 'update'])->name('Admin.keywords.update');
    Route::delete('admin/keyword/{id}', [KeywordController::class, 'destroy'])->name('Admin.keywords.destroy');
});







// Amenities routes
Route::middleware('auth')->group(function () {
    Route::get('admin/amenities', [AmenityController::class, 'index'])->name('Admin.amenities.index');
    Route::get('admin/amenity/create', [AmenityController::class, 'create'])->name('Admin.amenities.create');
    Route::post('admin/amenity', [AmenityController::class, 'store'])->name('Admin.amenities.store');
    Route::get('admin/amenity/{id}/edit', [AmenityController::class, 'edit'])->name('Admin.amenities.edit');
    Route::put('admin/amenity/{id}', [AmenityController::class, 'update'])->name('Admin.amenities.update');
    Route::delete('admin/amenity/{id}', [AmenityController::class, 'destroy'])->name('Admin.amenities.destroy');
});




// Builder routes
Route::middleware('auth')->group(function () {
    Route::get('admin/builders', [BuilderController::class, 'index'])->name('Admin.builders.index');
    Route::get('admin/builder/create', [BuilderController::class, 'create'])->name('Admin.builders.create');
    Route::post('admin/builder', [BuilderController::class, 'store'])->name('Admin.builders.store');
    Route::get('admin/builder/{id}/edit', [BuilderController::class, 'edit'])->name('Admin.builders.edit');
    Route::put('admin/builder/{id}', [BuilderController::class, 'update'])->name('Admin.builders.update');
    Route::delete('admin/builder/{id}', [BuilderController::class, 'destroy'])->name('Admin.builders.destroy');
});





// Testimonial routes
Route::middleware('auth')->group(function () {
    Route::get('admin/testimonials', [TestimonialController::class, 'index'])->name('Admin.testimonials.index');
    Route::get('admin/testimonial/create', [TestimonialController::class, 'create'])->name('Admin.testimonials.create');
    Route::post('admin/testimonial', [TestimonialController::class, 'store'])->name('Admin.testimonials.store');
    Route::get('admin/testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('Admin.testimonials.edit');
    Route::put('admin/testimonial/{id}', [TestimonialController::class, 'update'])->name('Admin.testimonials.update');
    Route::delete('admin/testimonial/{id}', [TestimonialController::class, 'destroy'])->name('Admin.testimonials.destroy');
});



// City routes
Route::middleware('auth')->group(function () {
    Route::get('admin/cities', [CityController::class, 'index'])->name('Admin.cities.index');
    Route::get('admin/city/create', [CityController::class, 'create'])->name('Admin.cities.create');
    Route::post('admin/city', [CityController::class, 'store'])->name('Admin.cities.store');
    Route::get('admin/city/{id}/edit', [CityController::class, 'edit'])->name('Admin.cities.edit');
    Route::put('admin/city/{id}', [CityController::class, 'update'])->name('Admin.cities.update');
    Route::post('admin/city/update-order', [CityController::class, 'updateOrder'])->name('Admin.cities.updateOrder');
    Route::delete('admin/city/{id}', [CityController::class, 'destroy'])->name('Admin.cities.destroy');
});





// Property sub type routes
Route::middleware('auth')->group(function () {
    Route::get('admin/psubtypes', [PropertySubTypeController::class, 'index'])->name('Admin.psubtypes.index');
    Route::get('admin/psubtype/create', [PropertySubTypeController::class, 'create'])->name('Admin.psubtypes.create');
    Route::post('admin/psubtype', [PropertySubTypeController::class, 'store'])->name('Admin.psubtypes.store');
    Route::get('admin/psubtype/{id}/edit', [PropertySubTypeController::class, 'edit'])->name('Admin.psubtypes.edit');
    Route::put('admin/psubtype/{id}', [PropertySubTypeController::class, 'update'])->name('Admin.psubtypes.update');
    Route::post('admin/psubtype/update-order', [PropertySubTypeController::class, 'updateOrder'])->name('Admin.psubtypes.updateOrder');
    Route::delete('admin/psubtype/{id}', [PropertySubTypeController::class, 'destroy'])->name('Admin.psubtypes.destroy');
});


// Home statistics routes
Route::middleware('auth')->group(function () {
    Route::get('admin/homestatistics', [HomeStatisticController::class, 'index'])->name('Admin.home_statistics.index');
    Route::get('admin/homestatistic/create', [HomeStatisticController::class, 'create'])->name('Admin.home_statistics.create');
    Route::post('admin/homestatistic', [HomeStatisticController::class, 'store'])->name('Admin.home_statistics.store');
    Route::get('admin/homestatistic/{id}/edit', [HomeStatisticController::class, 'edit'])->name('Admin.home_statistics.edit');
    Route::put('admin/homestatistic/{id}', [HomeStatisticController::class, 'update'])->name('Admin.home_statistics.update');
    Route::delete('admin/homestatistic/{id}', [HomeStatisticController::class, 'destroy'])->name('Admin.home_statistics.destroy');
});



// KFAQs routes
Route::middleware('auth')->group(function () {
    Route::get('admin/kfaqs', [\App\Http\Controllers\KfaqController::class, 'index'])->name('Admin.kfaqs.index');
    Route::get('admin/kfaq/create', [\App\Http\Controllers\KfaqController::class, 'create'])->name('Admin.kfaqs.create');
    Route::post('admin/kfaq', [\App\Http\Controllers\KfaqController::class, 'store'])->name('Admin.kfaqs.store');
    Route::get('admin/kfaq/{id}/edit', [\App\Http\Controllers\KfaqController::class, 'edit'])->name('Admin.kfaqs.edit');
    Route::put('admin/kfaq/{id}', [\App\Http\Controllers\KfaqController::class, 'update'])->name('Admin.kfaqs.update');
    Route::delete('admin/kfaq/{id}', [\App\Http\Controllers\KfaqController::class, 'destroy'])->name('Admin.kfaqs.destroy');
});





// Enquiry routes
Route::middleware('auth')->group(function () {
    Route::get('admin/enquiry-data', [EnquiryController::class, 'serviceEnquiries'])->name('Admin.enquiry_data.index');    
    Route::delete('admin/enquiries/{id}', [EnquiryController::class, 'destroy'])->name('Admin.enquiries.destroy');
});



Route::middleware('auth')->group(function () {
    // ABOUT US
    Route::get('admin/about-us', [AboutusController::class, 'editAbout'])->name('Admin.about.edit');
    Route::post('admin/about-us', [AboutusController::class, 'updateAbout'])->name('Admin.about.update');

    // FOUNDER
    Route::get('admin/founder', [AboutusController::class, 'editFounder'])->name('Admin.founder.edit');
    Route::post('admin/founder', [AboutusController::class, 'updateFounder'])->name('Admin.founder.update');

    // VISION MISSION STRENGTH — include ID in route
    Route::get('admin/vms', [AboutusController::class, 'editVms'])->name('Admin.vms.edit');
    Route::post('admin/vms', [AboutusController::class, 'updateVms'])->name('Admin.vms.update');
});




Route::get('/get-developer-suggestions', [PropertyController::class, 'getDeveloperSuggestions']);
Route::get('/get-properties-by-city-developer', [PropertyController::class, 'getPropertiesByCityAndDeveloper']);
Route::get('/search-properties', [PropertyController::class, 'searchProperties'])->name('search.properties');


// Settings Routes
Route::middleware('auth')->group(function () {
    Route::get('admin/settings', [SettingController::class, 'edit'])->name('Admin.settings.edit');
    Route::put('admin/settings', [SettingController::class, 'update'])->name('Admin.settings.update');
});


Route::get('/keywords/{slug}', [KeywordController::class, 'showKeyword'])->name('keywords.show');



Route::get('/city/{slug}', [CityController::class, 'showCityProperties'])->name('city.properties');

Route::get('/property-type/{propertyType}', [PropertyController::class, 'filterProperties'])->name('property.by.type');



// Authentication Root (Breeze by automaticaly)
require __DIR__.'/auth.php';