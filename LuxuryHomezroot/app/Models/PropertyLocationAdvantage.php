<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyLocationAdvantage extends Model
{
    use HasFactory;

    protected $table = 'property_location_advantages';

    protected $fillable = ['property_id', 'name', 'distance', 'type'];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}