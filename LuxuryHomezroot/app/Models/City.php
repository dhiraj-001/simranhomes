<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'short_content',
        'punchline'
    ];

 public function setHeadingAttribute($value)
    {
        $this->attributes['city_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

   

public function builders()
{
    return $this->belongsToMany(Builder::class, 'builder_city', 'city_id', 'builder_id');
}


}