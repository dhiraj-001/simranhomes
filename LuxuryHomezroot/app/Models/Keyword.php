<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    use HasFactory;

    protected $fillable = ['keyword_section_id', 'text', 'slug'];

    public function section()
    {
        return $this->belongsTo(KeywordSection::class, 'keyword_section_id');
    }
    
    public function properties()
{
    return $this->belongsToMany(Property::class, 'keyword_property');
}
}
