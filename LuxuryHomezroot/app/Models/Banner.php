<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'page',
        'type',
        'heading',
        'sub_heading',
        'description',
        'video',
        'images',
        'status',
    ];
    
    
   public function images()
{
    return $this->hasMany(\App\Models\BannerImage::class, 'banner_id')->orderBy('sort_order');
}
}
