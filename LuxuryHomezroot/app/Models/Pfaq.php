<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pfaq extends Model {
    protected $fillable = ['property_id', 'question', 'answer', 'status'];
}