<?php

use Illuminate\Database\Eloquent\Model;

class PropertyBuilder extends Model
{
    protected $table = 'property_builder';

    // Specify which columns are fillable if you're using mass-assignment
    protected $fillable = ['property_id', 'builder_id', 'builder_name', 'builder_logo', 'builder_content'];

    // Define relationship with Property model
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    // Define relationship with Builder model
    public function builder()
    {
        return $this->belongsTo(Builder::class, 'builder_id');
    }
}