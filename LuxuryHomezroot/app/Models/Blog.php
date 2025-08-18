<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'slug',
        'main_image',
        'short_content',
        'full_content',
        'breadcrumbs_image',
    ];


    public function setHeadingAttribute($value)
    {
        $this->attributes['heading'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    
    public function faqs() {
    return $this->hasMany(Faq::class)->where('status', 'active');
    }

}
