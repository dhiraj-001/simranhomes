<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeStatistic extends Model
{
    protected $fillable = ['icon_path', 'count', 'label', 'status'];
}
