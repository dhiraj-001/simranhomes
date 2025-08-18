<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_id',
        'image',
        'sort_order',
    ];

    /**
     * Get the banner this image belongs to.
     */
    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }
}
