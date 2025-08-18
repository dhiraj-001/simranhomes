<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFloorPlan extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'name', 'size', 'image', 'type'];

    // Define the relationship with Property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}