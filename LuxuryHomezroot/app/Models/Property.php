<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'slug',
        'main_image',
        'about_image',
        'about_content',
        'about_heading',
        'highlights_heading',
        'property_status',
        'property_type',
        'short_content',
        'full_content',
        'breadcrumbs_image',
        'map',
        'property_sub_type',
        'schema_seo',
        'is_trending_project',
        'property_city_wise',
    ];


    public function setHeadingAttribute($value)
    {
        $this->attributes['heading'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
   
    
    // Define the relationship with FloorPlan
    public function floorPlans()
    {
        return $this->hasMany(PropertyFloorPlan::class);
    }


    // Relationship with PropertyGallery
    public function galleries()
    {
        return $this->hasMany(PropertyGallery::class);
    }
    
    
    // Relationship with PropertyLocationAdvantage
    public function locationAdvantages()
    {
        return $this->hasMany(PropertyLocationAdvantage::class, 'property_id');
    }
    
    
    public function amenities()
    {
    return $this->belongsToMany(Amenity::class, 'property_amenity');
    }


    
   public function builder()
    {
        return $this->belongsTo(Builder::class, 'builder_id');
    }
   
    
    public function pfaqs()
    {
        return $this->hasMany(Pfaq::class);
    }

    public function prices()
    {
        return $this->hasMany(PropertyPrice::class);
    }
    
    
    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'keyword_property');
    }


}