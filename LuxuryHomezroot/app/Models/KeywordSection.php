<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordSection extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status'];

    public function keywords()
    {
        return $this->hasMany(Keyword::class, 'keyword_section_id');
    }
}
