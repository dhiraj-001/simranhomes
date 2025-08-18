<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyGallery extends Model
{
    use HasFactory;

    protected $table = 'property_galleries'; // Specify the table name

    protected $fillable = ['property_id', 'name', 'image'];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}