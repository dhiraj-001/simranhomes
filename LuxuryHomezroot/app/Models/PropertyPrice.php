<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'unit_type',
        'unit_size',
        'price',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
