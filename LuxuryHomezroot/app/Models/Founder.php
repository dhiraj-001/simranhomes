<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    protected $fillable = ['title', 'subtitle', 'description', 'name', 'designation', 'image'];
}
