<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertySubType extends Model
{
    protected $fillable = [
        'psubtype_name',
        'slug',
        'main_image',
        'order_number',
        'status',
    ];
}
