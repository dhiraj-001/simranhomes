<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Builder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'content',
        'status',
        'years_of_experience',
        'total_projects',
        'total_cities',
        
    ];

public function properties()
{
    return $this->hasMany(Property::class, 'builder_id');
}
    



public function cities()
{
    return $this->belongsToMany(City::class, 'builder_city', 'builder_id', 'city_id');
}



    
}