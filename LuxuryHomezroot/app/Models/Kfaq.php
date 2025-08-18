<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kfaq extends Model
{
    protected $fillable = [
        'keyword_id', 'question', 'answer',
    ];

    public function keyword()
    {
        return $this->belongsTo(Keyword::class);
    }
}
